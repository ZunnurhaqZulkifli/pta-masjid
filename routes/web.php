<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymnetController;
use App\Http\Controllers\UsersController;
use Illuminate\Foundation\Http\Middleware\HandlePrecognitiveRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// public routes
Route::group(
    [
        'middleware' => HandlePrecognitiveRequests::class,
    ],
    function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        // Route::get('/about-us', [DashboardController::class, 'aboutUs'])->name('about-us');
    }
);
// Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::resource('user', UsersController::class);
Route::resource('payment', PaymnetController::class);

Auth::routes();
