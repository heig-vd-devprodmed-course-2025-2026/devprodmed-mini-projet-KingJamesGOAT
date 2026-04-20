<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class FavoriteController
{
    /**
     * Affiche la liste des posts mis en favoris par l'utilisateur connecté
     */
    public function index(): View
    {
        // On récupère les posts favoris avec leurs relations pour éviter le problème N+1
        $posts = Auth::user()->favorites()->with(['user', 'likes', 'category'])->latest()->get();
        return view('favorites.index', compact('posts'));
    }

    /**
     * Ajoute un post aux favoris de l'utilisateur connecté
     */
    public function store(Post $post)
    {
        // On attache le post aux favoris (la méthode attach gère la table pivot)
        // On utilise contains() avant au cas où pour éviter les doublons, bien que notre contrainte unique protège aussi.
        if (!Auth::user()->favorites->contains($post->id)) {
            Auth::user()->favorites()->attach($post->id);
        }
        
        return back()->with('success', 'Post ajouté à vos favoris (études).');
    }

    /**
     * Retire un post des favoris de l'utilisateur connecté
     */
    public function destroy(Post $post)
    {
        // On détache le post (la méthode detach supprime l'entrée dans la table pivot)
        Auth::user()->favorites()->detach($post->id);
        
        return back()->with('success', 'Post retiré de vos favoris (études).');
    }
}
