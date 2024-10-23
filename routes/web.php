<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PaymentsController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\PublicUserController;
use App\Http\Controllers\StatisticController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UsersController;
use App\Http\Middleware\HandleInertiaRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard'); // dashboard

Route::group(
    [
        'prefix' => 'admin',
    ],
    function () {
        Route::resource('users', UsersController::class);
        Route::resource('transactions', TransactionController::class);
        Route::resource('projects', ProjectsController::class);
        Route::resource('payments', PaymentsController::class)->except('create'); // senarai bayaran
    }
);

Route::group(
    [
        'prefix' => 'public',
    ],
    function () {
        Route::resource('public' , PublicUserController::class);
        Route::get('statistics', [StatisticController::class, 'index'])->name('statistics');
        Route::get('payments/create', [PaymentsController::class, 'create'])
        ->middleware(HandleInertiaRequest::class)
        ->name('payments.create'); // borang bayaran
    }
);

Auth::routes();
