<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Post;

Route::get('/about', function () {
    return view('about');
});

Route::get('/', function () {
    // Récupère tous les posts du plus récent au plus ancien avec les infos de l'auteur et des likes
    $posts = Post::orderBy('created_at', 'desc')->with('user')->with('likes')->get();
    return view('home', ['posts' => $posts]);
});

Route::get('/profile', function () {
    // Pour le moment on fixe sur l'utilisateur janedoe pour tester l'affichage
    $user = User::where('username', 'janedoe')->first();
    $posts = Post::where('user_id', $user->id)
        ->orderBy('created_at', 'desc')
        ->with(['user', 'likes'])
        ->get();
    return view('profile', ['user' => $user, 'posts' => $posts]);
});
