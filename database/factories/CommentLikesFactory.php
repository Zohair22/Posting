<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\CommentLikes;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentLikesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CommentLikes::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id'=> User::factory(),
            'comment_id'=> Comment::factory(),
        ];
    }
}
