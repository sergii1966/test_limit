<?php

use App\Http\Controllers\User\UserProfileController;
use App\Http\Middleware\AuthMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/profile', UserProfileController::class)
    ->middleware(AuthMiddleware::class)
    ->name('profile');
