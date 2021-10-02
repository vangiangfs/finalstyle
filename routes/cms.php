<?php

use App\Http\Controllers\Cms\DashboardController;
use App\Http\Controllers\Cms\Users\LoginController;
use Illuminate\Support\Facades\Route;

Route::get(env('APP_CMS_PATH').'/login', [LoginController::class, 'login'])->name('login');
Route::get(env('APP_CMS_PATH').'/forgot-password', [LoginController::class, 'forgot_password'])->name('forgot-password');
Route::post(env('APP_CMS_PATH').'/do_login', [LoginController::class, 'do_login']);
Route::post(env('APP_CMS_PATH').'/do_forgot_password', [LoginController::class, 'do_forgot_password']);
Route::get(env('APP_CMS_PATH').'/logout', [LoginController::class, 'logout']);

Route::middleware(['auth'])->group(function(){
    Route::prefix(env('APP_CMS_PATH'))->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::resources([
            'users' => App\Http\Controllers\Cms\UsersController::class
        ]);
    });
});