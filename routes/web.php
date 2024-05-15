<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/features', function () {
    return view('features');
})->name('features');

Route::get('/dashboard', DashboardController::class)
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('/transactions', 'transactions')
    ->middleware(['auth', 'verified'])
    ->name('transactions');

Route::view('/goals', 'goals')
    ->middleware(['auth', 'verified'])
    ->name('goals');

Route::view('/accounts', 'accounts')
    ->middleware(['auth', 'verified'])
    ->name('accounts');

Route::view('/categories', 'categories')
    ->middleware(['auth', 'verified'])
    ->name('categories');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
