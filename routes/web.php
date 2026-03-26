<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Auth
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

// Root
Route::redirect('/', '/posts');

// Posts
Route::resource('posts', PostController::class)->only(['index', 'show']);
Route::resource('posts', PostController::class)->except(['index', 'show'])->middleware('auth');

// Likes (Nested Resource)
Route::resource('posts.likes', LikeController::class)->only(['store', 'destroy'])->middleware('auth');

// Users
Route::resource('users', UserController::class)->only(['show'])->parameters(['users' => 'user']);

// About
Route::view('/about', 'about')->name('about');
