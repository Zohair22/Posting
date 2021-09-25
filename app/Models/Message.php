<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Message extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function users() : BelongsToMany
    {
        return $this->belongsToMany(
            User::class,
            'users',
            'auth',
            'receiver',
        );
    }

    public function message()
    {
        return $this->where('auth',auth()->id())->where('receiver',$this->id)->get();
    }
}
