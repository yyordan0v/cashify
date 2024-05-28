<?php

namespace App\Http\Controllers;

use App\Charts\CategoryChart;
use App\Charts\IncomeChart;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __invoke(CategoryChart $categoryChart, IncomeChart $incomeChart)
    {
        $accounts = Auth::user()->accounts()->with('user')->get();

        $netWorth = $accounts->sum('balance');

        return view('dashboard', [
            'categoryChart' => $categoryChart->build(),
            'incomeChart' => $incomeChart->build(),
            'accounts' => $accounts,
            'netWorth' => $netWorth,
        ]);
    }
}
