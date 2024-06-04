<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTransactionRequest;
use App\Http\Requests\TransactionRequest;
use App\Models\Account;
use App\Models\Category;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactions = Transaction::orderBy('created_at', 'desc')->get();

        $groupedTransactions = $this->groupTransactionsByDate($transactions);

        $expenses = $transactions->filter(function ($transaction) {
            return $transaction->category->type === 'expense';
        });
        $groupedExpenses = $this->groupTransactionsByDate($expenses);

        $incomes = $transactions->filter(function ($transaction) {
            return $transaction->category->type === 'income';
        });
        $groupedIncomes = $this->groupTransactionsByDate($incomes);

        return view('transactions.index', compact('groupedTransactions', 'groupedExpenses', 'groupedIncomes'));
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
    public function store(TransactionRequest $request)
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

        return Redirect::route('transactions.index')->with('success', 'Transaction created successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TransactionRequest $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        //
    }

    private function groupTransactionsByDate($transactions)
    {
        $grouped = [];
        foreach ($transactions as $transaction) {
            $date = $this->formatDateGroup($transaction->created_at);
            $grouped[$date][] = $transaction;
        }
        return $grouped;
    }

    private function formatDateGroup($date)
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

    private function formatDate($date)
    {
        return Carbon::parse($date)->format('d F Y, \a\t h:i A');
    }
}
