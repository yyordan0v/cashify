<?php

namespace App\Http\Controllers;

use App\Charts\BalanceChart;
use App\Charts\CategoryChart;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(CategoryChart $categoryChart, BalanceChart $balanceChart)
    {
        $accounts = Auth::user()->accounts()->with('user')->latest()->get();

        $netWorth = $accounts->sum('balance');

        list($groupedTransactions, $groupedExpenses, $groupedIncomes) = $this->getTransactions();

        return view('dashboard', [
            'groupedTransactions' => $groupedTransactions,
            'groupedExpenses' => $groupedExpenses,
            'groupedIncomes' => $groupedIncomes,
            'categoryChart' => $categoryChart->build(),
            'balanceChart' => $balanceChart->build(),
            'accounts' => $accounts,
            'netWorth' => $netWorth,
        ]);
    }


    private function getTransactions(): array
    {
        $transactions = Transaction::query()->orderBy('created_at', 'desc')->limit(4)->get();

        $groupedTransactions = groupTransactionsByDate($transactions);

        $expenses = $transactions->filter(function ($transaction) {
            return $transaction->category->type === 'expense';
        });
        $groupedExpenses = groupTransactionsByDate($expenses);

        $incomes = $transactions->filter(function ($transaction) {
            return $transaction->category->type === 'income';
        });
        $groupedIncomes = groupTransactionsByDate($incomes);
        return array($groupedTransactions, $groupedExpenses, $groupedIncomes);
    }
}
