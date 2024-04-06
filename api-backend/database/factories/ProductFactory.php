<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'store_id' => fake()->numberBetween(1, 2),
            'category_id' => fake()->numberBetween(1, 5),
            'sku' => fake()->name(),
            'name' => fake()->name(),
            'slug' => Str::slug(fake()->name()),
            'price' => fake()->numberBetween(100000, 10000000),
            'published' => fake()->numberBetween(1, 3),
            'quantity' => fake()->numberBetween(1, 100),
            'description' => fake()->name(),
            'brand' => fake()->name(),
            'warranty' => fake()->name(),
            'warranty_type' => fake()->name(),
            'city_id' => fake()->numberBetween(1, 2)
        ];
    }
}
