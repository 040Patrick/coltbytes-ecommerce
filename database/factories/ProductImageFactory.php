<?php

namespace Database\Factories;

use App\Models\ProductImage;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<ProductImage>
 */
class ProductImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $path_images = [
            'products/camera.jpg',
            'products/makeup.jpg',
            'products/basket.jpg',
            'products/notebook.jpg',
            'products/grater.jpg',
            'products/carrot.jpg'
        ];

        return [
            'image' => $this->faker->randomElement($path_images)
        ];
    }
}
