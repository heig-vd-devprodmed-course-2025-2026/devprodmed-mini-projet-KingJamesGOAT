<?php

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('charge la page d accueil avec succes', function () {
    $response = $this->get('/');
    $response->assertStatus(200);
});

it('charge la page a propos avec succes', function () {
    $response = $this->get('/about');
    $response->assertStatus(200);
});

it('charge un profil utilisateur existant', function () {
    $user = User::forceCreate(['first_name' => 'Test', 'last_name' => 'User', 'username' => 'testuser', 'email' => 'test@test.com']);
    $response = $this->get('/@' . $user->username);
    $response->assertStatus(200);
});

it('charge un post existant', function () {
    $user = User::forceCreate(['first_name' => 'Test', 'last_name' => 'User', 'username' => 'testuser', 'email' => 'test@test.com']);
    $post = Post::forceCreate(['title' => 'Test', 'content' => 'Test', 'user_id' => $user->id]);
    $response = $this->get('/posts/' . $post->id);
    $response->assertStatus(200);
});

it('renvoie une erreur 404 pour un utilisateur introuvable', function () {
    $response = $this->get('/@utilisateurfantome');
    $response->assertStatus(404);
});

it('renvoie une erreur 404 pour un post introuvable', function () {
    $response = $this->get('/posts/999999999');
    $response->assertStatus(404);
});
