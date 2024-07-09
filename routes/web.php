<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;


Route::get('/', function () {
    return view('welcome');
});

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\ProfileController::class, 'index'])->name('home');

Auth::routes();

Route::get('/Profile/{user}', [App\Http\Controllers\ProfileController::class, 'index'])->name('Profile.show');

Route::get('/p/create', [PostsController::class, 'create']);
Route::post('/p', [PostsController::class, 'store']);
