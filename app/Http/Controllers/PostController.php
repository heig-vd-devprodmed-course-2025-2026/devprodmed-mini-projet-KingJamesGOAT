<?php
namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;

class PostController extends Controller
{
    public function index(): View
    {
        $posts = Post::orderBy('created_at', 'desc')->with(['user', 'likes'])->get();
        return view('home', ['posts' => $posts]);
    }

    public function show(string $id): View
    {
        $post = Post::with(['user', 'likes'])->findOrFail($id);
        return view('post', ['post' => $post]);
    }

    public function store(StorePostRequest $request)
    {
        // Validation des données effectuée par StorePostRequest
        $validated = $request->validated();

        // Comme nous n'avons pas encore de système de connexion complet, 
        // on attribue temporairement le post au premier utilisateur de la base
        $validated['user_id'] = \App\Models\User::first()->id;

        Post::create($validated);

        // Redirection vers l'accueil avec rechargement de la page
        return redirect('/');
    }

    public function edit(string $id)
    {
        $post = Post::findOrFail($id);
        return view('edit-post', ['post' => $post]);
    }

    public function update(UpdatePostRequest $request, string $id)
    {
        $post = Post::findOrFail($id);

        // Validation effectuée par UpdatePostRequest
        $validated = $request->validated();

        $post->update($validated);

        return redirect('/posts/' . $post->id);
    }

    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect('/');
    }

    public function toggleLike(string $id)
    {
        $post = Post::findOrFail($id);
        $userId = \App\Models\User::first()->id; // Utilisateur temporaire

        $existingLike = \App\Models\Like::where('post_id', $post->id)
                                        ->where('user_id', $userId)
                                        ->first();

        if ($existingLike) {
            $existingLike->delete();
        } else {
            $like = new \App\Models\Like();
            $like->post_id = $post->id;
            $like->user_id = $userId;
            $like->save();
        }

        return back(); // Retourne sur la page actuelle (accueil ou détail)
    }
}
