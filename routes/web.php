<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;
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
        ->name('accounts.index');

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

    //categories
    Route::get('/categories', [CategoryController::class, 'index'])
        ->name('categories.index');

    Route::get('/categories/create', [CategoryController::class, 'create'])
        ->name('categories.create');

    Route::post('/categories', [CategoryController::class, 'store'])
        ->name('categories.store');

    Route::get('/categories/{category}', [CategoryController::class, 'show'])
        ->name('categories.show')
        ->can('view', 'category');

    Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])
        ->name('categories.edit')
        ->can('update', 'category');

    Route::patch('/categories/{category}', [CategoryController::class, 'update'])
        ->name('categories.update')
        ->can('update', 'category');

    Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])
        ->name('categories.destroy')
        ->can('delete', 'category');

    Route::controller(SearchController::class)->group(function () {
        Route::post('/categories/icons', 'searchIcons')
            ->name('categories.searchIcons');

        Route::post('/categories/search/{type}', 'searchCategories')
            ->name('categories.searchCategories');
    });
});

require __DIR__.'/auth.php';
