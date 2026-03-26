<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Request;

class LikeController
{
    public function store(Request $request, Post $post)
    {
        $userId = $request->user()->id;

        if (!Like::where('post_id', $post->id)->where('user_id', $userId)->exists()) {
            $like = new Like();
            $like->post_id = $post->id;
            $like->user_id = $userId;
            $like->save();
        }

        return back();
    }

    public function destroy(Request $request, Post $post, Like $like)
    {
        // Actually, sometimes the like passed via Route Model Binding might not be owned by the user
        // Let's ensure the user can only delete their own like
        if ($like->user_id === $request->user()->id) {
            $like->delete();
        }

        return back();
    }
}
