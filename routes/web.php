<?php
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\MyProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

Route::get('/', [PostController::class, 'index']);
Route::get('/posts/{id}', [PostController::class, 'show'])->where('id', '[0-9]+');
Route::post('/posts', [PostController::class, 'store'])->middleware('auth');
Route::get('/posts/{id}/edit', [PostController::class, 'edit'])->middleware('auth')->where('id', '[0-9]+');
Route::put('/posts/{id}', [PostController::class, 'update'])->middleware('auth')->where('id', '[0-9]+');
Route::delete('/posts/{id}', [PostController::class, 'destroy'])->middleware('auth')->where('id', '[0-9]+');
Route::post('/posts/{id}/like', [LikeController::class, 'toggleLike'])->middleware('auth')->where('id', '[0-9]+');

Route::get('/about', function () {
    return view('about');
});

Route::get('/my-profile', [MyProfileController::class, 'show'])->middleware('auth')->name('my-profile');
Route::get('/@{username}', [ProfileController::class, 'show'])->where('username', '[A-Za-z0-9-_]+');
