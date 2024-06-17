<?php

namespace App\Http\Controllers;

use App\Charts\NetworthChart;
use App\Charts\SpendingChart;
use App\Models\NetWorth;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(NetworthChart $networthChart, SpendingChart $spendingChart)
    {
        $user = Auth::user();
        $accounts = $user->accounts()->with('user')->latest()->get();

        $netWorth = NetWorth::query()
            ->where('user_id', $user->id)
            ->latest('created_at')
            ->value('net_worth');

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
