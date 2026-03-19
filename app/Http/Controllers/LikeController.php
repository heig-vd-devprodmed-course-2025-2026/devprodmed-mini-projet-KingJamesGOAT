<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function toggleLike(Request $request, string $id)
    {
        $post = Post::findOrFail($id);
        $userId = $request->user()->id;

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

        return back();
    }
}
