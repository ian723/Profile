<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Controller;


// Auth::routes();

// Route::get('/home', [App\Http\Controllers\ProfileController::class, 'index'])->name('home');

Auth::routes();

Route::post('follow/{user}', [FollowsController::class, 'store']);

Route::get('/', [postsController::class, 'index']);
Route::get('/p/create', [PostsController::class, 'create']);
Route::get('/p/{post}', [PostsController::class, 'show']);
Route::post('/p', [PostsController::class, 'store']);

Route::get('/profile/{user}', [ProfileController::class, 'index'])->name('profile.show');
Route::get('/profile/{user}/edit', [ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile/{user}', [ProfileController::class, 'update'])->name('profile.update');
