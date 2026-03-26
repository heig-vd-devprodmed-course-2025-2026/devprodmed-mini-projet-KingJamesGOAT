<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController
{
    /**
     * Show the profile for a given user.
     */
    public function show(string $user): View
    {
        // $user is the literal username parameter passed from the route
        $userModel = User::where('username', $user)->firstOrFail();

        $posts = Post::where('user_id', $userModel->id)
            ->orderBy('created_at', 'desc')
            ->with(['user', 'likes'])
            ->get();
            
        return view('profile', ['user' => $userModel, 'posts' => $posts]);
    }
}
