<?php

namespace Database\Factories;

use App\Models\User;
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
            'username' => $this->faker->firstName(),
            'name' => $this->faker->firstName(),
            'surname' => $this->faker->lastName(),
            'email' => $this->faker->email(),
            'password' => $this->faker->password(),
            'is_admin' => $this->faker->randomElement([false,false,false,false,true]),
        ];
    }
}

