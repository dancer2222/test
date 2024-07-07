<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => $this->faker->title,
            'expire_date' => $this->faker->date(),
            'price' => $this->faker->randomDigitNotNull,
        ];
    }
}
