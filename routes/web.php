<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

include 'auth.php';

Route::get('/', HomeController::class)
    ->middleware(\App\Http\Middleware\UsersLimitMiddleware::class)
    ->middleware(\App\Http\Middleware\SetUserTimeMiddleware::class)
    ->name('home');

