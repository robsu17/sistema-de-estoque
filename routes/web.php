<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(function () {
  Route::get('/login', [LoginController::class, 'index'])->name('login.index');
  Route::post('/signin', [LoginController::class, 'signin'])->name('login.signin');

  Route::get('/register', [RegisterController::class, 'index'])->name('register.index');
  Route::post('/register/signup', [RegisterController::class, 'signup'])->name('register.signup');
});