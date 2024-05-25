<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
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
     * @param  Request  $request
     * @return array
     */
    public function getAttributes(Request $request): array
    {
        $input = $request->all();

        if (isset($input['balance'])) {
            $input['balance'] = str_replace(',', '.', $input['balance']);
        }

        return Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'balance' => ['required', 'numeric', 'min:0'],
            'color' => ['required', 'string', Rule::in($this->availableColors)],
        ])->validate();
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
    public function store(Request $request): RedirectResponse
    {
        $attributes = $this->getAttributes($request);

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
    public function update(Request $request, Account $account): RedirectResponse
    {
        $attributes = $this->getAttributes($request);

        $account = Account::findOrFail($account->id);

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
