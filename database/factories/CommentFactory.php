<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'parent_post_id' => $this->faker->numberBetween(1,1000),
            'parent_comment_id' => $this->faker->numberBetween(1,100),
            'body' => $this->faker->sentence($nbWords = 40, $variableNbWords = true),

        ];
    }
}
