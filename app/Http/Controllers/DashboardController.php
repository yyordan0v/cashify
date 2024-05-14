<?php

namespace App\Http\Controllers;

use App\Charts\CategoryChart;
use App\Charts\ExpensesChart;

class DashboardController extends Controller
{
    public function __invoke(ExpensesChart $chart, CategoryChart $categoryChart)
    {
        return view('dashboard', [
            'chart' => $chart->build(),
            'categoryChart' => $categoryChart->build(),
        ]);
    }
}
