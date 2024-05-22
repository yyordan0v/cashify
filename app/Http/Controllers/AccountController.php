<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AccountController extends Controller
{
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
        return view('accounts.create', ['validated' => true]);
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
        ]);

        if ($validator->fails()) {
            return response()
                ->view('accounts.create', [
                    'errors' => $validator->errors(),
                    'oldInput' => $request->all(),
                    'validated' => false,
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
            ]);
        }

        return view('accounts.edit', [
            '$account' => $account,
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
        ]);

        if ($validator->fails()) {
            return response()
                ->view('accounts.edit', [
                    'errors' => $validator->errors(),
                    'oldInput' => $request->all(),
                ]);
        }

        $attributes = $validator->validated();
        $account->update($attributes);

        return response()->view('accounts.show', compact('account'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Account $account)
    {
        $account->delete();

        if ($request->header('HX-Request')) {
            return '';
        }

        return redirect()->route('accounts.index');
    }
}
