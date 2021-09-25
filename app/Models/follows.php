<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

trait follows
{
    public function follower(): BelongsToMany
    {
        return $this->belongsToMany(User::class,'follows','followed', 'auth');
    }

    public function follows(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'follows', 'auth', 'followed');
    }

    public function following(User $user) : bool
    {
        return $this->follows()->where('followed', $user->id)->exists();
    }

    public function follow(User $user) : Model
    {
        return $this->follows()->save($user);
    }

    public function unfollow(User $user) : int
    {
        return $this->follows()->detach($user);
    }
}
