<?php

namespace App\Http\Controllers;

use App\Models\Follow;
use App\Models\User;
use Illuminate\Http\RedirectResponse;

class FollowController extends Controller
{
    public function store(User $user) : RedirectResponse
    {
        auth()->user()->follow($user);
        return back();
    }

    public function delete(User $user) : RedirectResponse
    {
        auth()->user()->unfollow($user);
        return back();
    }

    public function acceptFollow() : RedirectResponse
    {
        auth()->user()->acceptFollow();
        return back();
    }
}
