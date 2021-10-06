<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{

    /**
     * @param \App\Models\User $user
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function profile(User $user)
    {
        $posts = $user->posts()->latest()->get();
        return view('profile.timeline', compact('posts'));
    }
}
