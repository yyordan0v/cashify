<?php

namespace App\Http\Controllers;

use App\Charts\NetworthChart;
use App\Charts\SpendingChart;
use App\Models\NetWorth;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __invoke(NetworthChart $networthChart, SpendingChart $spendingChart): View
    {
        $user = Auth::user();
        $accounts = $user->accounts()->with('user')->latest()->get();

        $netWorth = NetWorth::query()
            ->where('user_id', $user->id)
            ->latest('created_at')
            ->value('net_worth');

        list($groupedTransactions, $groupedExpenses, $groupedIncomes, $totalExpenses, $totalIncomes) = $this->getTransactions();

        $groupedTransactions = array_slice($groupedTransactions, 0, 5);
        $groupedExpenses = array_slice($groupedExpenses, 0, 5);
        $groupedIncomes = array_slice($groupedIncomes, 0, 5);

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
        $transactions = Transaction::query()->with('user', 'category')->where('user_id',
            Auth::id())->orderBy('created_at',
            'desc')->limit(5)->get();

        $groupedTransactions = groupTransactionsByDate($transactions);

        $expenses = $transactions->filter(function ($transaction) {
            return $transaction->category->type === 'expense';
        });
        $groupedExpenses = groupTransactionsByDate($expenses);

        $incomes = $transactions->filter(function ($transaction) {
            return $transaction->category->type === 'income';
        });
        $groupedIncomes = groupTransactionsByDate($incomes);

        $totalExpenses = $expenses->sum('amount');
        $totalIncomes = $incomes->sum('amount');

        return [$groupedTransactions, $groupedExpenses, $groupedIncomes, $totalExpenses, $totalIncomes];
    }
}
