<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MenuItem1>
 */
class MenuItem1Factory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $foodNames = ['Pizza', 'Burger', 'Pasta', 'Steak', 'Sushi', 'Salad', 'Tacos'];

        return [
            'name' => $this->faker->randomElement($foodNames),
            'description' => $this->faker->sentence,
            'price' => $this->faker->randomElement([20000, 25000, 30000, 35000, 40000]),
            'category' => $this->faker->randomElement(['makanan', 'minuman']),
            'image' => $this->faker->imageUrl(),
            'status' => 'available',
        ];
    }
}
