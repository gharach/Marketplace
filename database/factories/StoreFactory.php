<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Store>
 */
class StoreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'radius' => fake()->randomDigit(),
            'owner_id' => fake()->randomNumber(),
            'description' => fake()->text(),
            'lat' => fake()->randomFloat(2,-10,10),
            'lang' => fake()->randomFloat(2,-10,10),
        ];
    }
}
