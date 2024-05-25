<?php

use App\Http\Controllers\AccountController;
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

Route::view('/categories', 'categories')
    ->middleware(['auth', 'verified'])
    ->name('categories');

Route::middleware('auth')->group(function () {
    // profile
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');


    //accounts
    Route::get('/accounts', [AccountController::class, 'index'])
        ->name('accounts.index')
        ->can('view', 'account');

    Route::get('/accounts/create', [AccountController::class, 'create'])
        ->name('accounts.create');

    Route::post('/accounts', [AccountController::class, 'store'])
        ->name('accounts.store');

    Route::get('/accounts/{account}', [AccountController::class, 'show'])
        ->name('accounts.show')
        ->can('view', 'account');

    Route::get('/accounts/{account}/edit', [AccountController::class, 'edit'])
        ->name('accounts.edit')
        ->can('update', 'account');

    Route::patch('/accounts/{account}', [AccountController::class, 'update'])
        ->name('accounts.update')
        ->can('update', 'account');

    Route::delete('/accounts/{account}', [AccountController::class, 'destroy'])
        ->name('accounts.destroy')
        ->can('delete', 'account');


});

require __DIR__.'/auth.php';
