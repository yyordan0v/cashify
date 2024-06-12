<?php

namespace App\Http\Controllers;

use App\Filters\TransactionFilter;
use App\Http\Requests\StoreTransactionRequest;
use App\Http\Requests\TransactionRequest;
use App\Models\Account;
use App\Models\Category;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $categories = Auth::user()
            ->categories()
            ->latest()
            ->with('user')
            ->orderBy('name', 'asc')
            ->get();

        $query = Transaction::query();

        $minAmount = $query->min('amount');
        $maxAmount = $query->max('amount');

        $transactionFilter = new TransactionFilter($request);
        $query = $transactionFilter->apply($query);

        $transactions = $query->orderBy('created_at', 'desc')->get();


        $groupedTransactions = $this->groupTransactionsByDate($transactions);

        return view('transactions.index', compact('categories', 'groupedTransactions', 'minAmount', 'maxAmount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Auth::user()
            ->categories()
            ->latest()
            ->with('user')
            ->get()
            ->groupBy('type');

        $accounts = Auth::user()->accounts()->with('user')->get();

        return view('transactions.create', [
            'incomeCategories' => $categories['income'] ?? [],
            'expenseCategories' => $categories['expense'] ?? [],
            'accounts' => $accounts,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TransactionRequest $request): RedirectResponse
    {
        $attributes = $request->validated();

        $account = Account::findOrFail($attributes['account_id']);
        $category = Category::findOrFail($attributes['category_id']);

        if ($category->type == 'expense') {
            $attributes['amount'] = -abs($attributes['amount']);
        }

        $account->update([
            'balance' => $account->balance + $attributes['amount'],
        ]);

        Auth::user()->transactions()->create($attributes);

        flashToast('success', 'Transaction created successfully.');

        return Redirect::route('transactions.index');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        $categories = Auth::user()
            ->categories()
            ->latest()
            ->with('user')
            ->get()
            ->where('type', $transaction->category->type);

        $accounts = Auth::user()->accounts()->with('user')->get();

        return view('transactions.edit', [
            'categories' => $categories,
            'accounts' => $accounts,
            'transaction' => $transaction,
            'selectedCategory' => $transaction->category,
            'selectedAccount' => $transaction->account,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TransactionRequest $request, Transaction $transaction)
    {
        $attributes = $request->validated();

        $oldAccount = $transaction->account;
        $newAccount = Account::findOrFail($attributes['account_id']);

        if ($transaction->category->type == 'expense') {
            $attributes['amount'] = -abs($attributes['amount']);
        }

        if ($oldAccount->id != $newAccount->id) {
            $oldAccount->update([
                'balance' => $oldAccount->balance - $transaction->amount,
            ]);

            $newAccount->update([
                'balance' => $newAccount->balance + $attributes['amount'],
            ]);
        } else {
            $newAccount->update([
                'balance' => $newAccount->balance - $transaction->amount + $attributes['amount'],
            ]);
        }


        $transaction->update($attributes);

        flashToast('success', 'Transaction updated successfully.');

        return Redirect::route('transactions.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        if ($transaction->category->type == 'expense') {
            $transaction->amount = -abs($transaction->amount);
        }

        $correctionCategory = Auth::user()->categories()->where('type', 'correction')->get();

        Auth::user()->transactions()->create([
            'user_id' => Auth::id(),
            'category_id' => $correctionCategory->first()->id,
            'account_id' => $transaction->account->id,
            'title' => 'Balance Correction',
            'amount' => -$transaction->amount,
            'details' => 'Account: '.$transaction->account->name.' - Deleted '.$transaction->title.' transaction.',
        ]);

        $transaction->account->update([
            'balance' => $transaction->account->balance - $transaction->amount,
        ]);

        $transaction->delete();

        return Redirect::route('transactions.index');
    }

    private function groupTransactionsByDate($transactions)
    {
        $grouped = [];
        foreach ($transactions as $transaction) {
            $date = $this->formatDate($transaction->created_at);
            $grouped[$date][] = $transaction;
        }
        return $grouped;
    }

    private function formatDate($date)
    {
        $carbonDate = Carbon::parse($date);
        $today = Carbon::today();
        $yesterday = Carbon::yesterday();

        if ($carbonDate->isToday()) {
            return 'TODAY, '.$carbonDate->format('F d');
        } elseif ($carbonDate->isYesterday()) {
            return 'YESTERDAY, '.$carbonDate->format('F d');
        } else {
            return strtoupper($carbonDate->format('l')).', '.$carbonDate->format('F d');
        }
    }
}
