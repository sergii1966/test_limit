<?php

use App\Http\Controllers\HomeController;
use App\Http\Middleware\AuthMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/profile', HomeController::class)
    ->middleware(AuthMiddleware::class)
    ->name('profile');
