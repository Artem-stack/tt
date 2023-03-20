<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;


Route::get('movies/by', [\App\Http\Controllers\MoviesController::class, 'by'])->name('by');
Route::get('movieswith', [\App\Http\Controllers\GenresController::class, 'movieswith'])->name('movieswith');
Route::resource('movies', \App\Http\Controllers\MoviesController::class);
  
     Route::resource('genre', \App\Http\Controllers\GenresController::class);

Route::get('movies/index', [\App\Http\Controllers\MoviesController::class, 'index'])->name('movies/index');



  Route::get('movies/create', [\App\Http\Controllers\MoviesController::class, 'create'])->name('movies.create');
  Route::get('/autocomplete-search',[\App\Http\Controllers\MoviesController::class, 'autocompleteSearch']);


  
    Route::get('genre/create', [\App\Http\Controllers\GenresController::class, 'create'])->name('genre.create');
    Route::get('category/{cat}', [\App\Http\Controllers\GenresController::class, 'category'])->name('category');
 

Route::get('genre', [\App\Http\Controllers\GenresController::class, 'index'])->name('genre.index');










