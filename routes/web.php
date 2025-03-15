<?php

use App\Http\Controllers\HomeController;
use App\Http\Middleware\SetUserTimeMiddleware;
use App\Http\Middleware\UsersLimitMiddleware;
use Illuminate\Support\Facades\Route;

include 'auth.php';

Route::group([
    'middleware' => [
        UsersLimitMiddleware::class,
        SetUserTimeMiddleware::class
    ]
], function () {
    Route::get('/', HomeController::class)->name('home');

    include 'user.php';
});

