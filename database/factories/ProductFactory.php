<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Product>
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
        $name = $this->faker->unique()->name();
        return [
            'name' => $name,
            'slug' => $name,
            'description' => $this->faker->sentence(),
            'price' => $this->faker->numberBetween(100, 30000),
            'stock' => $this->faker->numberBetween(0, 50),
        ];
    }
}
