<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTransactionRequest;
use App\Http\Requests\UpdateTransactionRequest;
use App\Models\Transaction;
use Carbon\Carbon;

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
        return view('transactions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTransactionRequest $request)
    {
        //
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
    public function update(UpdateTransactionRequest $request, Transaction $transaction)
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
