<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Support\Facades\Auth;

class PostController
{
    public function index(): View
    {
        $posts = Post::orderBy('created_at', 'desc')->with(['user', 'likes'])->get();
        return view('posts.index', ['posts' => $posts]);
    }

    public function create(): View
    {
        return view('posts.create');
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
        $post = Post::with(['user', 'likes'])->findOrFail($id);
        
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
        return view('edit-post', ['post' => $post]);
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
