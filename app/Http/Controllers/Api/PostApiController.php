<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use Illuminate\Http\Request;

class PostApiController
{
    /**
     * Liste les derniers posts.
     * C'est ici que l'application remplit la contrainte de "mise à disposition d'une API" (Endpoint 1).
     */
    public function index()
    {
        // On récupère les derniers posts, on peut se limiter aux champs de base + fen_string
        $posts = Post::latest('created_at')->get();

        return response()->json($posts);
    }

    /**
     * Retourne les données d'un post spécifique, de son auteur et de sa catégorie.
     * C'est ici que l'application remplit la contrainte de "mise à disposition d'une API" (Endpoint 2).
     */
    public function show(Post $post)
    {
        // On charge l'auteur et la catégorie pour respecter la consigne
        $post->load(['user', 'category']);

        return response()->json($post);
    }
}
