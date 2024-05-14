<?php

namespace App\Http\Controllers;

use App\Charts\CategoryChart;
use App\Charts\IncomeChart;

class DashboardController extends Controller
{
    public function __invoke(CategoryChart $categoryChart, IncomeChart $incomeChart)
    {
        return view('dashboard', [
            'categoryChart' => $categoryChart->build(),
            'incomeChart' => $incomeChart->build(),
        ]);
    }
}
