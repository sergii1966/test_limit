<?php

use App\Http\Controllers\Auth\LoginExitProcessController;
use App\Http\Controllers\Auth\LoginProcessController;
use App\Http\Controllers\Auth\LoginShowFormController;
use App\Http\Controllers\Auth\RegisterProcessController;
use App\Http\Controllers\Auth\RegisterShowFormController;
use App\Http\Controllers\Auth\ResetPasswordControllerShowNewPasswordForm;
use App\Http\Controllers\Auth\ResetPasswordShowEmailFormController;
use App\Http\Controllers\Auth\ResetPasswordSendResetLinkEmailController;
use App\Http\Controllers\Auth\ResetPasswordProcessController;
use App\Http\Middleware\AuthMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/login', LoginShowFormController::class)
    ->withoutMiddleware(AuthMiddleware::class)
    ->name('login.form');

Route::post('/login/process', LoginProcessController::class)
    ->withoutMiddleware(AuthMiddleware::class)
    ->name('login.process');

Route::get('/register', RegisterShowFormController::class)
    ->withoutMiddleware(AuthMiddleware::class)
    ->name('register.form');

Route::post('/register/process', RegisterProcessController::class)
    ->withoutMiddleware(AuthMiddleware::class)
    ->name('register.process');

Route::get('/exit-login/process', LoginExitProcessController::class)
    ->name('login.out.process');

//Восстановление пароля вывод формы с email
Route::get('/forgot-password-form-email', ResetPasswordShowEmailFormController::class)
    ->withoutMiddleware(AuthMiddleware::class)
    ->middleware('guest')
    ->name('password.reset.form.email');

//Восстановление пароля обработка формы с email
//и отправка сообщения по данному email
Route::post('/forgot-password-form-email-process', ResetPasswordSendResetLinkEmailController::class)
    ->withoutMiddleware(AuthMiddleware::class)
    ->middleware('guest')
    ->name('password.email');
//
//Восстановление пароля вывод формы для заполнения нового пароля
Route::get('/reset-password/{token}', ResetPasswordControllerShowNewPasswordForm::class)
    ->middleware('guest')
    ->withoutMiddleware(AuthMiddleware::class)
    ->name('password.reset');
//
//Восстановление пароля
Route::post('/reset-password-update',  ResetPasswordProcessController::class)
    ->middleware('guest')
    ->withoutMiddleware(AuthMiddleware::class)
    ->name('password.update');
