<?php

namespace App\Http\Controllers;

use App\Charts\ExpensesChart;

class DashboardController extends Controller
{
    public function __invoke(ExpensesChart $chart)
    {
        return view('dashboard', [
            'chart' => $chart->build()
        ]);
    }
}
