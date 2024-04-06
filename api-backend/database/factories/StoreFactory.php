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
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'city_id' => fake()->numberBetween(1, 2),
            'district_id' => fake()->numberBetween(1, 4),
            'address' => fake()->address(),
            'image' => fake()->name()
        ];
    }
}
