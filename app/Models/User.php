<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use follows;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function comments() : HasMany
    {
        return $this->hasMany(Comment::class, 'user_id');
    }

    public function posts() : HasMany
    {
        return $this->hasMany(Post::class, 'user_id');
    }

    public function getRouteKeyName() : string
    {
        return 'username';
    }

    public function timeline()
    {
        $follows = $this->followed()->pluck('followed');
        return Post::where('user_id', $this->id)->orWhereIn('user_id', $follows)
            ->latest()->get();
    }

    public function scopeFilter($query, $filters) : void
    {
        /* search by Post */
        $query->when(
            $filters ?? false,
            fn($query, $search) => $query->where(
                fn($query) => $query->where('name', 'like', '%'.$search.'%')
                    ->orWhere('username', 'like', '%'.$search.'%')
            )
        );
    }

}
