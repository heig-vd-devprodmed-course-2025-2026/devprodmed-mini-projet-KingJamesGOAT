<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MyProfileController extends Controller
{
    public function show(Request $request): View
    {
        $user = $request->user();

        $posts = Post::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->with(['user', 'likes'])
            ->get();
            
        return view('profile', ['user' => $user, 'posts' => $posts]);
    }
}
