<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments() : HasMany
    {
        return $this->hasMany(Comment::class, 'comment_id');
    }

    public function postLikes() : HasMany
    {
        return $this->hasMany(PostLikes::class, 'post_id');
    }

    public function postLikeCount()
    {
        return $this->postLikes()->count();
    }

    public function userLikeIt()
    {
        return $this->postLikes()
            ->where('user_id', auth()->id())->get('id');
    }
}
