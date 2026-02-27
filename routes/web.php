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

Route::get('/test-user', function () {
    $user = new User();

    $user->first_name = 'John';
    $user->last_name = 'Doe';
    $user->username = 'johndoe';
    $user->email = 'johndoe@example.com';

    $user->save();

    return $user;
});

Route::get('/test-post-1', function () {
    $user = User::first();

    $post = new Post();
    $post->title = 'Mon premier post';
    $post->content = 'Ceci est le contenu de mon premier post.';

    $user->posts()->save($post);

    return $post;
});

Route::get('/test-post-2', function () {
    $user = User::find(1);

    $post = new Post();
    $post->content = 'Ceci est le contenu de mon deuxieme post.';

    $post->user()->associate($user);

    $post->save();

    return $post;
});

Route::get('/test-like', function () {
    /** @var User $user */
    $user = User::find(1);

    /** @var Post $post */
    $post = Post::find(2);

    $user->likes()->attach($post->id, ['reaction' => 'love']);

    return $post->likes;
});
