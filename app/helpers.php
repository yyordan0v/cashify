<?php

use App\Models\Account;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

if (!function_exists('flashToast')) {
    function flashToast($type, $description, $title = null, $position = 'top-right'): void
    {
        if (is_null($title)) {
            $title = match ($type) {
                'success' => __('Success'),
                'error' => __('Error'),
                'warning' => __('Warning'),
                'info' => __('Info'),
                default => __('Notification'),
            };
        }

        $toasts = session()->get('toasts', []);
        $toasts[] = [
            'type' => $type,
            'title' => $title,
            'description' => $description,
            'position' => $position
        ];

        session()->flash('toasts', $toasts);
    }
}


if (!function_exists('parseDateRange')) {
    function parseDateRange($dateRange): array
    {
        [$startDate, $endDate] = explode(' - ', $dateRange);

        $startDate = Carbon::createFromFormat('M d, Y', trim($startDate))->startOfDay()->format('Y-m-d H:i:s');
        $endDate = Carbon::createFromFormat('M d, Y', trim($endDate))->endOfDay()->format('Y-m-d H:i:s');

        return [$startDate, $endDate];
    }
}

if (!function_exists('formatDate')) {
    function formatDate($date): string
    {
        $locale = app()->getLocale();
        $carbonDate = Carbon::parse($date)->locale($locale);
        $today = Carbon::today()->locale($locale);
        $yesterday = Carbon::yesterday()->locale($locale);

        if ($carbonDate->isToday()) {
            return __('TODAY').', '.$carbonDate->isoFormat('MMMM D');
        } elseif ($carbonDate->isYesterday()) {
            return __('YESTERDAY').', '.$carbonDate->isoFormat('MMMM D');
        } else {
            return strtoupper($carbonDate->isoFormat('dddd')).', '.$carbonDate->isoFormat('MMMM D');
        }
    }
}


if (!function_exists('groupTransactionsByDate')) {
    function groupTransactionsByDate($transactions): array
    {
        $grouped = [];
        foreach ($transactions as $transaction) {
            $date = formatDate($transaction->created_at);
            $grouped[$date][] = $transaction;
        }
        return $grouped;
    }
}

if (!function_exists('updateNetworth')) {
    function updateNetworth(): void
    {
        $netWorth = Account::where('user_id', Auth::id())->sum('balance');

        Auth::user()->netWorth()->create([
            'net_worth' => $netWorth,
        ]);
    }
}
