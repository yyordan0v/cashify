<?php

namespace App\Http\Controllers;

use App\Charts\NetworthChart;
use App\Charts\SpendingChart;
use App\Models\Account;
use App\Models\NetWorth;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __invoke(NetworthChart $networthChart, SpendingChart $spendingChart): View
    {
        $user = Auth::user();
        $accounts = Account::with('user', 'transactions')->latest()->get();

        $netWorth = NetWorth::query()
            ->where('user_id', $user->id)
            ->latest('created_at')
            ->value('net_worth');

        $totals = Transaction::query()
            ->selectRaw('SUM(CASE WHEN categories.type = "expense" THEN transactions.amount ELSE 0 END) AS total_expenses')
            ->selectRaw('SUM(CASE WHEN categories.type = "income" THEN transactions.amount ELSE 0 END) AS total_incomes')
            ->where('transactions.user_id', $user->id)
            ->join('categories', 'transactions.category_id', '=', 'categories.id')
            ->first();

        $totalExpenses = $totals->total_expenses ?? 0;
        $totalIncomes = $totals->total_incomes ?? 0;

        list($groupedTransactions, $groupedExpenses, $groupedIncomes) = $this->getTransactions();

        $networthChartData = $networthChart->build();
        $spendingChartData = $spendingChart->build();

        return view('dashboard', [
            'groupedTransactions' => $groupedTransactions,
            'groupedExpenses' => $groupedExpenses,
            'groupedIncomes' => $groupedIncomes,
            'accounts' => $accounts,
            'netWorth' => $netWorth,
            'dateRanges' => $networthChartData['dateRanges'],
            'networthChartData' => $networthChartData['data'],
            'spendingChartData' => $spendingChartData['data'],
            'spendingChartLabels' => $spendingChartData['labels'],
            'totalExpenses' => $totalExpenses,
            'totalIncomes' => $totalIncomes,
        ]);
    }

    private function getTransactions(): array
    {
        $transactions = Transaction::query()
            ->with('category')
            ->where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        $groupedTransactions = groupTransactionsByDate($transactions);

        $expenses = $transactions->filter(function ($transaction) {
            return $transaction->category->type === 'expense';
        });
        $groupedExpenses = groupTransactionsByDate($expenses);

        $incomes = $transactions->filter(function ($transaction) {
            return $transaction->category->type === 'income';
        });
        $groupedIncomes = groupTransactionsByDate($incomes);

        return [$groupedTransactions, $groupedExpenses, $groupedIncomes];
    }
}
