<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'surname' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
        ];
    }
}
