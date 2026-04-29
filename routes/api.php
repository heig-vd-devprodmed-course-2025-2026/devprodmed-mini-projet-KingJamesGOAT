<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PostApiController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Routes pour l'API des posts (mise à disposition d'une API)
Route::get('/posts', [PostApiController::class, 'index'])->name('api.posts.index');
Route::get('/posts/{post}', [PostApiController::class, 'show'])->name('api.posts.show');
