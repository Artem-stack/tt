<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

Route::get('/', [\App\Http\Controllers\IndexController::class, 'index'])->name('home');

Route::get('/admin/users/user', [\App\Http\Controllers\UsersController::class, 'index'])->name('admin.users.users');


  Route::get('/admin/users/create', [\App\Http\Controllers\UsersController::class, 'create'])->name('admin.users.create');
  Route::get('/autocomplete-search',[\App\Http\Controllers\UsersController::class, 'autocompleteSearch']);

// Position
  
    Route::get('/admin/position/create', [\App\Http\Controllers\PositionsController::class, 'create'])->name('admin.position.create');
 

Route::get('/admin/position/position', [\App\Http\Controllers\PositionsController::class, 'index'])->name('admin.position.position');









