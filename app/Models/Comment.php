<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Comment extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function post() : BelongsTo
    {
        return $this->belongsTo(Post::class, 'post_id');
    }

    public function commentLikes() : HasMany
    {
        return $this->hasMany(CommentLikes::class, 'comment_id');
    }

    public function postLikeCount()
    {
        return $this->commentLikes()->count();
    }

    public function userLikeIt()
    {
        return $this->commentLikes()
            ->where('user_id', auth()->id())->get('id');
    }
}
