<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

Route::get('/', [\App\Http\Controllers\IndexController::class, 'index'])->name('home');

Route::get('/read', [\App\Http\Controllers\IndexController::class, 'showread'])->name('showread');

 Route::get('/admin/users/users', [\App\Http\Controllers\UsersController::class, 'index'])->name('admin.users');

Route::get('/admin/users/user', [\App\Http\Controllers\UsersController::class, 'index'])->name('admin.users.users');


  Route::get('/admin/users/create', [\App\Http\Controllers\UsersController::class, 'create'])->name('admin.users.create');

  Route::resource('users', UsersController::class);
   Route::resource('users', \App\Http\Controllers\UsersController::class);


Route::middleware("auth:web")->group(function () {
    Route::get('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout');

   
});

Route::middleware("guest:web")->group(function () {
    Route::get('/login', [\App\Http\Controllers\AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login_process', [\App\Http\Controllers\AuthController::class, 'login'])->name('login_process');

    Route::get('/register', [\App\Http\Controllers\AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register_process', [\App\Http\Controllers\AuthController::class, 'register'])->name('register_process');

    Route::get('/forgot', [\App\Http\Controllers\AuthController::class, 'showForgotForm'])->name('forgot');
    Route::post('/forgot_process', [\App\Http\Controllers\AuthController::class, 'forgot'])->name('forgot_process');
});





