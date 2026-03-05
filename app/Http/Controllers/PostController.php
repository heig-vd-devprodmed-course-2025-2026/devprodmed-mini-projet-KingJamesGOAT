<?php
namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\View\View;

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
}
