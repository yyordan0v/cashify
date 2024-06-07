<?php

namespace App\Http\Controllers;

use App\Http\Requests\AccountRequest;
use App\Models\Account;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
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
        $accounts = Auth::user()->accounts()->with('user')->get();

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

        Auth::user()->accounts()->create($attributes);
        notify()->success('Account created successfully!');

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
    public function edit(Account $account): View
    {
        return view('accounts.edit', [
            'account' => $account,
            'availableColors' => $this->availableColors,
            'selectedColor' => $account->color,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AccountRequest $request, Account $account): RedirectResponse
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
                'details' => 'Account: '.$account->name.' - Old Balance: '.$account->balance.', New Balance: '.$attributes['balance'].'.',
            ]);
        }

        $account->update($attributes);

        return Redirect::route('accounts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Account $account): RedirectResponse
    {
        $account->delete();

        return Redirect::route('accounts.index');
    }

    public function transfer(HtmxRequest $request, Account $account)
    {
        $account = Account::findOrFail($account->id);
        $userAccounts = Auth::user()->accounts()->with('user')->where('id', '!=', $account->id)->get();


        if ($request->isHtmxRequest()) {
            return HtmxResponse::addFragment('accounts.transfer', 'form', compact('account', 'userAccounts'));
        }

        return view('accounts.transfer', compact('account', 'userAccounts'));


    }

    public function storeTransfer(HtmxRequest $request, Account $account)
    {
        $request->validate([
            'to_account' => 'required', 'exists:accounts,id',
            'amount' => 'required', 'numeric', 'min:0.01',
        ]);

        $fromAccount = Account::findOrFail($account->id);
        $toAccount = Account::findOrFail($request->to_account);

        $amount = abs($request->amount);

        $transferCategory = Auth::user()->categories()->where('type', 'transfer')->get();

        Auth::user()->transactions()->create([
            'user_id' => Auth::id(),
            'category_id' => $transferCategory->first()->id,
            'account_id' => $toAccount->id,
            'title' => $toAccount->name.' Transfer In',
            'amount' => $amount,
            'details' => 'Account: '.$toAccount->name.' - Old Balance: '.$toAccount->balance.', New Balance: '.$toAccount->balance + $amount.'.',
        ]);

        Auth::user()->transactions()->create([
            'user_id' => Auth::id(),
            'category_id' => $transferCategory->first()->id,
            'account_id' => $fromAccount->id,
            'title' => $fromAccount->name.' Transfer Out',
            'amount' => -$amount,
            'details' => 'Account: '.$fromAccount->name.' - Old Balance: '.$fromAccount->balance.', New Balance: '.$fromAccount->balance - $amount.'.',
        ]);

        $fromAccount->update(['balance' => $fromAccount->balance - $amount]);
        $toAccount->update(['balance' => $toAccount->balance + $amount]);

//        TODO: Return the show fragment but make update both accounts - old and new (check oob-swap)!
        return Redirect::route('accounts.index');
    }
}
