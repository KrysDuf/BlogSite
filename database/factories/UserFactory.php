<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Login;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return[
            'name' => $this->faker->firstName(),
            'firstname' => $this->faker->firstName(),
            'surname' => $this->faker->lastName(),
            'password' => $this->faker->password(),
            'email' => $this->faker->email(),
        ];
    }
}

