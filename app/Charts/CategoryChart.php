<?php

namespace App\Charts;

use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use marineusde\LarapexCharts\Charts\DonutChart as OriginalDonutChart;

class CategoryChart
{
    public function build(): OriginalDonutChart
    {
        $categories = Auth::user()->categories()->where('type', 'expense')->get();

        $data = [];
        $labels = [];

        foreach ($categories as $category) {
            $totalAmount = abs(Transaction::where('category_id', $category->id)->sum('amount'));
            $data[] = $totalAmount;
            $labels[] = $category->name;
        }

        return (new OriginalDonutChart)
            ->addData($data)
            ->setLabels($labels)
            ->setFontColor('#808080')
            ->setShowLegend('false');
    }
}

