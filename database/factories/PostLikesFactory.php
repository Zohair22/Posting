<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\PostLikes;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostLikesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PostLikes::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id'=> User::factory(),
            'post_id'=> Post::factory(),
        ];
    }
}
