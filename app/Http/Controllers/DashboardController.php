<?php

namespace App\Http\Controllers;

use App\Charts\NetworthChart;
use App\Models\NetWorth;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(NetworthChart $networthChart)
    {
        $user = Auth::user();
        $accounts = $user->accounts()->with('user')->latest()->get();

        $netWorth = NetWorth::query()
            ->where('user_id', $user->id)
            ->latest('created_at')
            ->value('net_worth');

        list($groupedTransactions, $groupedExpenses, $groupedIncomes) = $this->getTransactions();

        return view('dashboard', [
            'groupedTransactions' => $groupedTransactions,
            'groupedExpenses' => $groupedExpenses,
            'groupedIncomes' => $groupedIncomes,
            'accounts' => $accounts,
            'netWorth' => $netWorth,
            'dateRanges' => $this->getChartsDateRanges(),
            'networthChartData' => $networthChart->build()
        ]);
    }

    private function getChartsDateRanges()
    {
        $now = Carbon::now();
        $oneWeekAgo = $now->copy()->subWeek();
        $oneMonthAgo = $now->copy()->subMonth();
        $sixMonthsAgo = $now->copy()->subMonths(6);
        $oneYearAgo = $now->copy()->subYear();
        $startOfYear = $now->copy()->startOfYear();
        $allTimeStart = NetWorth::query()->where('user_id', auth()->id())->min('created_at');

        return [
            'one_week' => [$this->formatDate($oneWeekAgo), $this->formatDate($now)],
            'one_month' => [$this->formatDate($oneMonthAgo), $this->formatDate($now)],
            'six_months' => [$this->formatDate($sixMonthsAgo), $this->formatDate($now)],
            'one_year' => [$this->formatDate($oneYearAgo), $this->formatDate($now)],
            'ytd' => [$this->formatDate($startOfYear), $this->formatDate($now)],
            'all' => [$this->formatDate($allTimeStart), $this->formatDate($now)],
        ];
    }

    private function formatDate($date): string
    {
        return Carbon::parse($date)->format('d M Y');
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
