<?php

use App\Http\Controllers\UsersApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/regiter', [UsersApiController::class, 'store'])->name('users.register');