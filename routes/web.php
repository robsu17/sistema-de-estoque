<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::resource('/login', LoginController::class);
Route::get('/login', [LoginController::class, 'index'])->name('login');


Route::resource('/register', RegisterController::class);

Route::middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/pesq', [DashboardController::class, 'searchProducts'])->name('dashboard.searchProducts');
    Route::get('/reports', [DashboardController::class, 'reports'])->name('dashboard.reports');
    Route::get('/movements', [DashboardController::class, 'movements'])->name('dashboard.movements');
    Route::match(['get', 'post'],'/baixa/{produtoId}', [DashboardController::class, 'baixa'])
        ->name('dashboard.baixa');

    Route::resource('/products', ProductController::class);
});
