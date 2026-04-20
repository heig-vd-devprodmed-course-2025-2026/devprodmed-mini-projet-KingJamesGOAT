<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Support\Facades\Auth;

class PostController
{
    public function index(Request $request): View
    {
        // On inclut la relation 'category' pour éviter le problème N+1
        $query = Post::orderBy('created_at', 'desc')->with(['user', 'likes', 'category']);

        // Filtrage des publications si un category_id est présent dans l'URL (?category_id=x)
        if ($request->has('category_id')) {
            $query->where('category_id', $request->query('category_id'));
        }

        $posts = $query->get();
        // On charge les catégories pour les passer à la vue (utiles pour le formulaire de création)
        $categories = Category::all();

        return view('posts.index', ['posts' => $posts, 'categories' => $categories]);
    }

    public function create(): View
    {
        // On transmet la liste des catégories à la vue de création
        $categories = Category::all();
        return view('posts.create', ['categories' => $categories]);
    }

    public function store(StorePostRequest $request)
    {
        // Validation des données effectuée par StorePostRequest
        $validated = $request->validated();

        $validated['user_id'] = $request->user()->id;

        Post::create($validated);

        // Redirection vers l'accueil
        return redirect()->route('posts.index');
    }

    public function show(string $id): View
    {
        // On charge aussi la catégorie pour l'affichage
        $post = Post::with(['user', 'likes', 'category'])->findOrFail($id);
        
        $reaction = null;
        if (Auth::check()) {
            $like = $post->likes->where('user_id', Auth::id())->first();
            $reaction = $like ? $like->pivot->reaction ?? null : null;
        }
        
        return view('posts.show', ['post' => $post, 'reaction' => $reaction]);
    }

    public function edit(string $id)
    {
        $post = Post::findOrFail($id);
        Gate::authorize('update', $post);
        // On récupère les catégories pour le formulaire d'édition
        $categories = Category::all();
        return view('edit-post', ['post' => $post, 'categories' => $categories]);
    }

    public function update(UpdatePostRequest $request, string $id)
    {
        $post = Post::findOrFail($id);
        Gate::authorize('update', $post);

        // Validation effectuée par UpdatePostRequest
        $validated = $request->validated();

        $post->update($validated);

        return redirect()->route('posts.show', $post->id);
    }

    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
        Gate::authorize('delete', $post);
        $post->delete();

        return redirect()->route('posts.index');
    }
}
