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
        return $this->follows()->where('followed', $user->id)->where('accepted',1)->exists();
    }

    public function iRequestFollow(User $user) : bool
    {
        return $this->follows()->where('followed', $user->id)->where('accepted',0)->exists();
    }

    public function myRequestFollow(User $user) : bool
    {
        return
            $this
                ->follower()
                ->where('auth', $user->id)
                ->where('followed',auth()->id())
                ->where('accepted',0)
                ->exists();
    }

    public function followed()
    {
        return $this->follows()->where('auth', auth()->id())->where('accepted', 1);
    }

    public function follow(User $user) : Model
    {
        return $this->follows()->save($user);
    }

    public function acceptFollow() : int
    {
        return $this->follower()->update([
            'accepted' => 1
        ]);
    }

    public function unfollow(User $user) : int
    {
        return $this->follows()->detach($user);
    }
}
