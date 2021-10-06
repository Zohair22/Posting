<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function store(Request $request) : RedirectResponse
    {
        $attributes = $request->validate([
            'body' => '',
            'user_id' => '',
            'thumbnail' => 'mimes:jpeg,jpg,png,gif',
        ]);

        $attributes['user_id'] = auth()->id();

        if (isset($attributes['thumbnail']))
        {
            $attributes['thumbnail'] = request('thumbnail')->store(('posts'));
        }
        if (request('thumbnail') !== null || request('body') !== null)
        {
            Post::create($attributes);
        }
        return back();
    }

    public function destroy($id) : RedirectResponse
    {
        Post::findOrFail($id)->delete();
        return back();
    }
}
