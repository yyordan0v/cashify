<?php

namespace App\Http\Controllers;

use App\Http\Requests\AccountRequest;
use App\Models\Account;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

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

        return Redirect::route('accounts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Account $account): Response
    {
        return response()->view('accounts.show', [
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

        if ($attributes['balance'] !== $account->balance) {
            $correctionCategory = Auth::user()->categories()->where('type', 'correction')->get();

            Auth::user()->transactions()->create([
                'user_id' => Auth::id(),
                'category_id' => $correctionCategory->first()->id,
                'account_id' => $account->id,
                'title' => 'Balance Correction',
                'amount' => $attributes['balance'] - $account->balance,
                'details' => $account->name.' - Old Balance: '.$account->balance.', New Balance: '.$attributes['balance'].'.',
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
}
