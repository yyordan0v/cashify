<?php

namespace App\Charts;

use App\Models\NetWorth;
use Carbon\Carbon;
use marineusde\LarapexCharts\Charts\AreaChart as OriginalAreaChart;

class BalanceChart
{
    public function build(): array
    {
        // Fetch net worth data for the authenticated user
        $netWorthData = NetWorth::query()
            ->where('user_id', auth()->id())
            ->orderBy('created_at', 'asc')
            ->pluck('net_worth')
            ->toArray();

        // Generate labels in the format '13 Jun 2024'
        $labels = NetWorth::query()
            ->where('user_id', auth()->id())
            ->orderBy('created_at', 'asc')
            ->pluck('created_at')
            ->map(function ($date) {
                return Carbon::parse($date)->format('Y-m-d');
            })
            ->toArray();

        // Build the chart object
        $chart = (new OriginalAreaChart)
            ->addData('Net Worth', $netWorthData)
            ->setLabels($labels) // Set the labels
            ->setColors(['#808080'])
            ->setFontColor('#808080')
            ->setHeight(350)
            ->setToolbar(true)
            ->setGrid()
            ->setDataLabels(false);

        $now = Carbon::now();
        $oneMonthAgo = $now->copy()->subMonth();
        $sixMonthsAgo = $now->copy()->subMonths(6);
        $oneYearAgo = $now->copy()->subYear();
        $startOfYear = $now->copy()->startOfYear();
        $allTimeStart = NetWorth::query()->where('user_id', auth()->id())->min('created_at');


        return [
            'chart' => $chart,
            'dateRanges' => [
                'one_month' => [$this->formatDate($oneMonthAgo), $this->formatDate($now)],
                'six_months' => [$this->formatDate($sixMonthsAgo), $this->formatDate($now)],
                'one_year' => [$this->formatDate($oneYearAgo), $this->formatDate($now)],
                'ytd' => [$this->formatDate($startOfYear), $this->formatDate($now)],
                'all' => [$this->formatDate($allTimeStart), $this->formatDate($now)],
            ],
        ];
    }

    private function formatDate($date): string
    {
        return Carbon::parse($date)->format('Y-m-d');
    }

}
