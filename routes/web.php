<?php
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PostController::class, 'index']);
Route::get('/posts/{id}', [PostController::class, 'show'])->where('id', '[0-9]+');
Route::post('/posts', [PostController::class, 'store']);
Route::get('/posts/{id}/edit', [PostController::class, 'edit'])->where('id', '[0-9]+');
Route::put('/posts/{id}', [PostController::class, 'update'])->where('id', '[0-9]+');
Route::delete('/posts/{id}', [PostController::class, 'destroy'])->where('id', '[0-9]+');
Route::post('/posts/{id}/like', [PostController::class, 'toggleLike'])->where('id', '[0-9]+');

Route::get('/about', function () {
    return view('about');
});

Route::get('/@{username}', [ProfileController::class, 'show'])->where('username', '[A-Za-z0-9-_]+');
