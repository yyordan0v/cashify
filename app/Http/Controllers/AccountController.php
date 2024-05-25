<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

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
    public function index()
    {
        $accounts = Auth::user()->accounts()->with('user')->get();

        return view('accounts.index', compact('accounts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('accounts.create', [
            'validated' => true,
            'availableColors' => $this->availableColors,
            'selectedColor' => $this->selectedColor,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $input['balance'] = str_replace(',', '.', $input['balance']);

        $validator = Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'balance' => ['required', 'numeric', 'min:0'],
            'color' => ['required', 'string', Rule::in($this->availableColors)],
        ]);

        if ($validator->fails()) {
            return response()
                ->view('accounts.create', [
                    'errors' => $validator->errors(),
                    'oldInput' => $request->all(),
                    'validated' => false,
                    'availableColors' => $this->availableColors,
                    'selectedColor' => $request->input('color', Account::getDefaultColor()),
                ]);
        }

        $attributes = $validator->validated();
        $account = Auth::user()->accounts()->create($attributes);

        return response()->view('accounts.show', compact('account'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Account $account)
    {
        return response()->view('accounts.show', [
            'account' => $account,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Account $account)
    {
        if ($request->header('HX-Request')) {
            return response()->view('accounts.edit', [
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
    public function update(Request $request, Account $account)
    {
        $input = $request->all();
        $input['balance'] = str_replace(',', '.', $input['balance']);

        $validator = Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'balance' => ['required', 'numeric', 'min:0'],
            'color' => ['required', 'string', Rule::in($this->availableColors)],
        ]);

        if ($validator->fails()) {
            return response()
                ->view('accounts.edit', [
                    'account' => $account,
                    'errors' => $validator->errors(),
                    'oldInput' => $request->all(),
                    'availableColors' => $this->availableColors,
                    'selectedColor' => $request->input('color', Account::getDefaultColor()),
                ]);
        }

        $account = Account::findOrFail($account->id);

        $attributes = $validator->validated();
        $account->update($attributes);

        return redirect()->route('accounts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Account $account)
    {
        $request->validateWithBag('accountDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $account->delete();

        return redirect()->route('accounts.index');
    }
}
