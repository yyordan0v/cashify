<?php

namespace App\Http\Controllers;

use App\Http\Requests\AccountRequest;
use App\Models\Account;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;
use Mauricius\LaravelHtmx\Facades\HtmxResponse;
use Mauricius\LaravelHtmx\Http\HtmxRequest;

class AccountController extends Controller
{
    protected array $availableColors;
    protected string $selectedColor;

    public function __construct()
    {
        $this->availableColors = Account::getAvailableColors();
        $this->selectedColor = Account::getDefaultColor();
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $accounts = Account::with('transactions')->where('user_id', Auth::id())->latest()->get();

        return view('accounts.index', compact('accounts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('accounts.create', [
            'availableColors' => $this->availableColors,
            'selectedColor' => $this->selectedColor,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AccountRequest $request): RedirectResponse
    {
        $attributes = $request->validated();
        $user = Auth::user();

        $account = $user->accounts()->create($attributes);

        if ($attributes['balance'] != 0) {
            $correctionCategory = Auth::user()->categories()->where('type', 'correction')->get();

            Auth::user()->transactions()->create([
                'user_id' => Auth::id(),
                'category_id' => $correctionCategory->first()->id,
                'account_id' => $account->id,
                'title' => 'Balance Correction',
                'amount' => $attributes['balance'],
                'details' => __('Account :account created with balance of :balance.', [
                    'account' => $account->name,
                    'balance' => $attributes['balance'],
                ]),
            ]);
        }

        updateNetworth();

        flashToast('success', 'Account created successfully.');

        return Redirect::route('accounts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(HtmxRequest $request, Account $account)
    {
        if ($request->isHtmxRequest()) {
            return HtmxResponse::addFragment('accounts.show', 'panel', [
                'account' => $account,
            ]);
        }

        return view('accounts.show', [
            'account' => $account,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HtmxRequest $request, Account $account)
    {
        if ($request->isHtmxRequest()) {
            return HtmxResponse::addFragment('accounts.edit', 'form', [
                'account' => $account,
                'availableColors' => $this->availableColors,
                'selectedColor' => $account->color,
            ]);
        }

        return view('accounts.edit', [
            'account' => $account,
            'availableColors' => $this->availableColors,
            'selectedColor' => $account->color,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AccountRequest $request, Account $account)
    {
        $attributes = $request->validated();

        $account = Account::findOrFail($account->id);

        if ($attributes['balance'] != $account->balance) {
            $correctionCategory = Auth::user()->categories()->where('type', 'correction')->get();

            Auth::user()->transactions()->create([
                'user_id' => Auth::id(),
                'category_id' => $correctionCategory->first()->id,
                'account_id' => $account->id,
                'title' => 'Balance Correction',
                'amount' => $attributes['balance'] - $account->balance,
                'details' => __('Account: :account - Old Balance: :old_balance, New Balance: :new_balance.', [
                    'account' => $account->name,
                    'old_balance' => $account->balance,
                    'new_balance' => $attributes['balance'],
                ]),
            ]);
        }

        $account->update($attributes);

        updateNetworth();

        return HtmxResponse::addFragment('accounts.show', 'panel', ['account' => $account])
            ->pushUrl(route('accounts.index'))
            ->retarget('this')
            ->reswap('outerHTML');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Account $account)
    {
        $account->delete();

        updateNetworth();

        return '';
    }

    public function transfer(HtmxRequest $request, Account $account)
    {
        $account = Account::findOrFail($account->id);
        $userAccounts = Auth::user()->accounts()->with('user')->where('id', '!=', $account->id)->latest()->get();


        if ($request->isHtmxRequest()) {
            return HtmxResponse::addFragment('accounts.transfer', 'form', compact('account', 'userAccounts'));
        }

        return view('accounts.transfer', compact('account', 'userAccounts'));


    }

    public function storeTransfer(HtmxRequest $request, Account $account)
    {
        $account = Account::findOrFail($account->id);

        $validator = Validator::make($request->all(), [
            'to_account' => 'required|exists:accounts,id',
            'amount' => 'required|numeric|min:0.01',
        ]);

        if ($validator->fails()) {
            $userAccounts = Auth::user()->accounts()->with('user')->where('id', '!=', $account->id)->latest()->get();

            return HtmxResponse::addFragment('accounts.transfer', 'form',
                ['errors' => $validator->errors(), 'account' => $account, 'userAccounts' => $userAccounts])
                ->retarget('this')
                ->reswap('outerHTML');
        }

        $fromAccount = Account::findOrFail($account->id);
        $toAccount = Account::findOrFail($request->to_account);

        $amount = abs($request->amount);

        $transferCategory = Auth::user()->categories()->where('type', 'transfer')->get();

        $this->storeTransferTransactions($transferCategory, $toAccount, $amount, $fromAccount);

        $fromAccount->update(['balance' => $fromAccount->balance - $amount]);
        $toAccount->update(['balance' => $toAccount->balance + $amount]);

        return Redirect::route('accounts.index');
    }

    public function storeTransferTransactions($transferCategory, $toAccount, $amount, $fromAccount): void
    {
        Auth::user()->transactions()->create([
            'user_id' => Auth::id(),
            'category_id' => $transferCategory->first()->id,
            'account_id' => $toAccount->id,
            'title' => $toAccount->name.' Transfer In',
            'amount' => $amount,
            'details' => __('Account: :account - Old Balance: :old_balance, New Balance: :new_balance.', [
                'account' => $toAccount->name,
                'old_balance' => $toAccount->balance,
                'new_balance' => $toAccount->balance + $amount,
            ]),
        ]);

        Auth::user()->transactions()->create([
            'user_id' => Auth::id(),
            'category_id' => $transferCategory->first()->id,
            'account_id' => $fromAccount->id,
            'title' => $fromAccount->name.' Transfer Out',
            'amount' => -$amount,
            'details' => __('Account: :account - Old Balance: :old_balance, New Balance: :new_balance.', [
                'account' => $fromAccount->name,
                'old_balance' => $fromAccount->balance,
                'new_balance' => $fromAccount->balance - $amount,
            ]),
        ]);
    }
}
