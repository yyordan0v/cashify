<?php

namespace App\Charts;

use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class SpendingChart
{
    public function build(): array
    {
        $categories = Auth::user()->categories()->where('type', 'expense')->get();

        $data = [];
        $labels = [];

        foreach ($categories as $category) {
            $totalAmount = abs(Transaction::where('category_id', $category->id)->sum('amount'));
            $data[] = $totalAmount;
            $labels[] = $category->name;
        }

        return [
            'data' => $data,
            'labels' => $labels,
        ];
    }
}

