<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PaymentsController;
use App\Http\Controllers\PublicUserController;
use App\Http\Controllers\StatisticController;
use App\Http\Controllers\UsersController;
use Illuminate\Foundation\Http\Middleware\HandlePrecognitiveRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// public routes
Route::group(
    [
        // 'middleware' => HandlePrecognitiveRequests::class,
    ],
    function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard'); // dashboard
        Route::resource('payments', PaymentsController::class); // senarai bayaran
    }
);

Route::group(
    [
        'prefix' => 'admin',
    ],
    function () {
        Route::resource('users', UsersController::class); // CRUD users
    }
);

Route::group(
    [
        'prefix' => 'public',
    ],
    function () {
        Route::resource('public' , PublicUserController::class);
        Route::get('statistics', [StatisticController::class, 'index'])->name('statistics');
    }
);

Auth::routes();
