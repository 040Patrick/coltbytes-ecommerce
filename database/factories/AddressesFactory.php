<?php

namespace Database\Factories;

use App\Models\Addresses;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Addresses>
 */
class AddressesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'postal_code' => $this->faker->postcode(),
            'city' => $this->faker->city(),
            'state' => $this->faker->streetAddress(),
            'neighborhood' => $this->faker->words(2, true),
            'street' => $this->faker->streetName(),
            'number' => $this->faker->numberBetween(1, 9999),
            'complement' => $this->faker->secondaryAddress(),
        ];
    }
}
