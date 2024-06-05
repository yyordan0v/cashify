<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\CancelController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\TransactionController;
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


Route::middleware('auth')->group(callback: function () {
    // profile
    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profile', 'edit')
            ->name('profile.edit');

        Route::patch('/profile', 'update')
            ->name('profile.update');

        Route::delete('/profile', 'destroy')
            ->name('profile.destroy');
    });

    Route::post('/cancel', CancelController::class)->name('cancel');


    // Accounts
    Route::controller(AccountController::class)->group(function () {
        Route::get('/accounts', 'index')
            ->name('accounts.index');

        Route::get('/accounts/create', 'create')
            ->name('accounts.create');

        Route::post('/accounts', 'store')
            ->name('accounts.store');

        Route::get('/accounts/{account}', 'show')
            ->name('accounts.show')
            ->can('view', 'account');

        Route::get('/accounts/{account}/edit', 'edit')
            ->name('accounts.edit')
            ->can('update', 'account');

        Route::patch('/accounts/{account}', 'update')
            ->name('accounts.update')
            ->can('update', 'account');

        Route::delete('/accounts/{account}', 'destroy')
            ->name('accounts.destroy')
            ->can('delete', 'account');
    });

    //    Categories
    Route::controller(CategoryController::class)->group(function () {
        Route::get('/categories', 'index')
            ->name('categories.index');

        Route::get('/categories/create', 'create')
            ->name('categories.create');

        Route::post('/categories', 'store')
            ->name('categories.store');

        Route::get('/categories/{category}', 'show')
            ->name('categories.show')
            ->can('view', 'category');

        Route::get('/categories/{category}/edit', 'edit')
            ->name('categories.edit')
            ->can('update', 'category');

        Route::patch('/categories/{category}', 'update')
            ->name('categories.update')
            ->can('update', 'category');

        Route::delete('/categories/{category}', 'destroy')
            ->name('categories.destroy')
            ->can('delete', 'category');
    });


    //    Transactions
    Route::controller(TransactionController::class)->group(function () {
        Route::get('/transactions', 'index')
            ->name('transactions.index');

        Route::get('/transactions/create', 'create')
            ->name('transactions.create');

        Route::post('/transactions', 'store')
            ->name('transactions.store');

        Route::get('/transactions/{transaction}/edit', 'edit')
            ->name('transactions.edit')
            ->can('update', 'transaction');

        Route::patch('/transactions/{transaction}', 'update')
            ->name('transactions.update')
            ->can('update', 'transaction');

        Route::delete('/transactions/{transaction}', 'destroy')
            ->name('transactions.destroy')
            ->can('delete', 'transaction');
    });


    //    Search
    Route::controller(SearchController::class)->group(function () {
        Route::post('/search/icons', 'searchIcons')
            ->name('categories.searchIcons');

        Route::post('/search/categories/{type}', 'searchCategories')
            ->name('categories.searchCategories');
    });
});

require __DIR__.'/auth.php';
