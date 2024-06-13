<?php

use Carbon\Carbon;

if (!function_exists('flashToast')) {
    function flashToast($type, $description, $title = null, $position = 'top-right'): void
    {
        if (is_null($title)) {
            $title = match ($type) {
                'success' => 'Success',
                'error' => 'Error',
                'warning' => 'Warning',
                'info' => 'Info',
                default => 'Notification',
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
        // Split the input string into start and end date
        [$startDate, $endDate] = explode(' - ', $dateRange);

        // Convert the start and end date to the database format
        $startDate = Carbon::createFromFormat('M d, Y', trim($startDate))->startOfDay()->format('Y-m-d H:i:s');
        $endDate = Carbon::createFromFormat('M d, Y', trim($endDate))->endOfDay()->format('Y-m-d H:i:s');

        return [$startDate, $endDate];
    }
}

if (!function_exists('formatDate')) {
    function formatDate($date): string
    {
        $carbonDate = Carbon::parse($date);
        $today = Carbon::today();
        $yesterday = Carbon::yesterday();

        if ($carbonDate->isToday()) {
            return 'TODAY, '.$carbonDate->format('F d');
        } elseif ($carbonDate->isYesterday()) {
            return 'YESTERDAY, '.$carbonDate->format('F d');
        } else {
            return strtoupper($carbonDate->format('l')).', '.$carbonDate->format('F d');
        }
    }
}

if (!function_exists('groupTransactionsByDate')) {
    function groupTransactionsByDate($transactions)
    {
        $grouped = [];
        foreach ($transactions as $transaction) {
            $date = formatDate($transaction->created_at);
            $grouped[$date][] = $transaction;
        }
        return $grouped;
    }
}
