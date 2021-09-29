<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, $post) : RedirectResponse
    {
        $attributes = $request->validate([
            'body' => '',
            'user_id' => '',
            'post_id' => '',
            'thumbnail' => 'image',
        ]);

        $attributes['user_id'] = auth()->id();
        $attributes['post_id'] = $post;

        if (isset($attributes['thumbnail']))
        {
            $attributes['thumbnail'] = request('thumbnail')->store(('comments'));
        }
        if (request('thumbnail') !== null || request('body') !== null)
        {
            Comment::create($attributes);
        }
        return back();
    }
}
