<?php

namespace App\Charts;

use App\Models\NetWorth;

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

        return $chartData;
    }
}
