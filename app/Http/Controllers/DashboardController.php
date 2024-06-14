<?php

namespace App\Http\Controllers;

use App\Charts\BalanceChart;
use App\Charts\CategoryChart;
use App\Models\NetWorth;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(CategoryChart $categoryChart, BalanceChart $balanceChart)
    {
        $user = Auth::user();
        $accounts = $user->accounts()->with('user')->latest()->get();

        $netWorth = NetWorth::query()
            ->where('user_id', $user->id)
            ->latest('created_at')
            ->value('net_worth');


        list($groupedTransactions, $groupedExpenses, $groupedIncomes) = $this->getTransactions();

        $chartData = (new BalanceChart())->build();

        return view('dashboard', [
            'groupedTransactions' => $groupedTransactions,
            'groupedExpenses' => $groupedExpenses,
            'groupedIncomes' => $groupedIncomes,
            'categoryChart' => $categoryChart->build(),
            'balanceChart' => $chartData['chart'],
            'dateRanges' => $chartData['dateRanges'],
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
