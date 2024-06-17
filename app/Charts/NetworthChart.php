<?php

namespace App\Charts;

use App\Models\NetWorth;
use Carbon\Carbon;

class NetworthChart
{
    public function build(): array
    {
        $netWorthData = NetWorth::query()
            ->where('user_id', auth()->id())
            ->orderBy('created_at')
            ->get(['net_worth', 'created_at']);

        $chartData = [];

        foreach ($netWorthData as $data) {
            $timestamp = $data->created_at->timestamp * 1000; // Convert to milliseconds
            $chartData[] = [$timestamp, $data->net_worth];
        }

        $dateRanges = $this->getChartsDateRanges();

        return [
            'data' => $chartData,
            'dateRanges' => $dateRanges
        ];
    }

    private function getChartsDateRanges(): array
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
}
