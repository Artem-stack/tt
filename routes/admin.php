<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/admin/admin_users/index');
});


     Route::resource('users', \App\Http\Controllers\UsersController::class);
  
     Route::resource('position', \App\Http\Controllers\PositionsController::class);
    






