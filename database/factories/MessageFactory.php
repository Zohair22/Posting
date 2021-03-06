<?php

namespace Database\Factories;

use App\Models\message;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class MessageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = message::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'body'=> $this->faker->text(),
            'auth'=> User::factory(),
            'receiver'=> User::factory(),
        ];
    }
}
