<?php

namespace App\Http\Controllers;

use App\Charts\NetworthChart;
use App\Charts\SpendingChart;
use App\Models\Account;
use App\Models\NetWorth;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __invoke(NetworthChart $networthChart, SpendingChart $spendingChart)
    {
        $user = Auth::user();
        $userId = $user->id;

        $accounts = $this->getUserAccounts($userId);
        $netWorth = $this->getLatestNetWorth($userId);
        $totals = $this->getTransactionTotals($userId);

        $totalExpenses = $totals->total_expenses ?? 0;
        $totalIncomes = $totals->total_incomes ?? 0;

        list($groupedTransactions, $groupedExpenses, $groupedIncomes) = $this->getGroupedTransactions($userId);

        $networthChartData = $networthChart->build();
        $spendingChartData = $spendingChart->build();

        $spendingChartDataRounded = array_map(function ($value) {
            return round($value, 2);
        }, $spendingChartData['data']);


        return view('dashboard', [
            'groupedTransactions' => $groupedTransactions,
            'groupedExpenses' => $groupedExpenses,
            'groupedIncomes' => $groupedIncomes,
            'accounts' => $accounts,
            'netWorth' => $netWorth,
            'dateRanges' => $networthChartData['dateRanges'],
            'networthChartData' => $networthChartData['data'],
            'spendingChartData' => $spendingChartDataRounded,
            'spendingChartLabels' => $spendingChartData['labels'],
            'totalExpenses' => $totalExpenses,
            'totalIncomes' => $totalIncomes,
        ]);
    }

    private function getUserAccounts($userId)
    {
        return Account::with('transactions')
            ->where('user_id', $userId)
            ->latest()
            ->get();
    }

    private function getLatestNetWorth($userId)
    {
        return NetWorth::query()
            ->where('user_id', $userId)
            ->latest('created_at')
            ->value('net_worth');
    }

    private function getTransactionTotals($userId)
    {
        return Transaction::query()
            ->selectRaw('SUM(CASE WHEN categories.type = "expense" THEN transactions.amount ELSE 0 END) AS total_expenses')
            ->selectRaw('SUM(CASE WHEN categories.type = "income" THEN transactions.amount ELSE 0 END) AS total_incomes')
            ->where('transactions.user_id', $userId)
            ->join('categories', 'transactions.category_id', '=', 'categories.id')
            ->first();
    }

    private function getGroupedTransactions($userId): array
    {
        $groupedTransactions = $this->fetchAndGroupTransactions($userId);
        $groupedExpenses = $this->fetchAndGroupTransactions($userId, 'expense');
        $groupedIncomes = $this->fetchAndGroupTransactions($userId, 'income');

        return [$groupedTransactions, $groupedExpenses, $groupedIncomes];
    }

    private function fetchAndGroupTransactions($userId, string $type = null): array
    {
        $query = Transaction::query()
            ->with('category')
            ->where('user_id', $userId)
            ->orderBy('created_at', 'desc')
            ->limit(5);

        if ($type) {
            $query->whereHas('category', function ($query) use ($type) {
                $query->where('type', $type);
            });
        }

        $transactions = $query->get();

        return groupTransactionsByDate($transactions);
    }
}
