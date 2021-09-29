<?php

namespace App\Http\Controllers;

use App\Models\CommentLikes;
use App\Models\PostLikes;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CommentLikesController extends Controller
{
    public function store(Request $request, $post) : RedirectResponse
    {
        $attributes = $request->validate([
            'comment_id' => '',
            'user_id' => '',
        ]);
        $attributes['user_id'] = auth()->id();
        $attributes['comment_id'] = $post;

        $comment_id = $attributes['comment_id'];
        $user_id = $attributes['user_id'];
        $request->validate([
            'like' => Rule::unique('comment_likes')->where(function ($query) use
            ($comment_id, $user_id, $request) {
                return $query
                    ->where('comment_id',$comment_id)
                    ->where('user_id',$user_id);
            }) ,
        ]);

        CommentLikes::create($attributes);
        return back();
    }

    public function destroy($like) : RedirectResponse
    {
        $postLike = CommentLikes::findOrFail($like);
        $postLike->delete();
        return back();
    }

}
