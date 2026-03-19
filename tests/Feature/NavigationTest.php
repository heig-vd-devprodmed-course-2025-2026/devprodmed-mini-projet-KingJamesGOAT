<?php

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use function Pest\Laravel\get;

uses(RefreshDatabase::class);

it('charge la page d accueil avec succes', function () {
    $response = get('/');
    $response->assertStatus(200);
});

it('charge la page a propos avec succes', function () {
    $response = get('/about');
    $response->assertStatus(200);
});

it('charge un profil utilisateur existant', function () {
    $user = User::forceCreate(['first_name' => 'Test', 'last_name' => 'User', 'username' => 'testuser1', 'email' => 'test1@test.com', 'password' => 'password']);
    $response = get('/@' . $user->username);
    $response->assertStatus(200);
});

it('charge un post existant', function () {
    $user = User::forceCreate(['first_name' => 'Test', 'last_name' => 'User', 'username' => 'testuser2', 'email' => 'test2@test.com', 'password' => 'password']);
    $post = Post::forceCreate(['title' => 'Test', 'content' => 'Test', 'user_id' => $user->id]);
    $response = get('/posts/' . $post->id);
    $response->assertStatus(200);
});

it('renvoie une erreur 404 pour un utilisateur introuvable', function () {
    $response = get('/@utilisateurfantome');
    $response->assertStatus(404);
});

it('renvoie une erreur 404 pour un post introuvable', function () {
    $response = get('/posts/999999999');
    $response->assertStatus(404);
});
