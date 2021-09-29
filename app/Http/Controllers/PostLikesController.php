<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostLikes;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PostLikesController extends Controller
{
    public function store(Request $request, $post) : RedirectResponse
    {
        $attributes = $request->validate([
            'post_id' => '',
            'user_id' => '',
        ]);
        $attributes['user_id'] = auth()->id();
        $attributes['post_id'] = $post;

        $post_id = $attributes['post_id'];
        $user_id = $attributes['user_id'];
        $request->validate([
            'like' => Rule::unique('post_likes')->where(function ($query) use
            ($post_id, $user_id, $request) {
                return $query
                    ->where('post_id',$post_id)
                    ->where('user_id',$user_id);
            }) ,
        ]);

        PostLikes::create($attributes);
        return back();
    }

    public function destroy($like) : RedirectResponse
    {
        $postLike = PostLikes::findOrFail($like);
        $postLike->delete();
        return back();
    }

}
