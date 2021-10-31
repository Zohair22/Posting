<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Message extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user() : BelongsTo
    {
        return $this->belongsTo(
            User::class,
            'auth',
        );
    }

    public function message($id)
    {
       return $this->whereIn('auth', [auth()->id(), $id])->WhereIn('receiver',
           [auth()->id(), $id])->orderBy('created_at', 'asc')->get();
    }


}
