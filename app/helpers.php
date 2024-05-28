<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Route;

if (!function_exists('getButtonRoute')) {
    function getButtonRoute(): string
    {
        $currentRoute = Route::currentRouteName();

        return match (true) {
            str_contains($currentRoute, 'categories') => route('categories.create'),
            str_contains($currentRoute, 'accounts') => route('accounts.create'),
            default => route('transactions'),
        };
    }
}
