<?php

namespace Database\Factories;

use App\Models\MenuItem1;
use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\orderItem>
 */
class orderItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'order_id' => Order::inRandomOrder()->first()->id,
            'menu_item_id' => MenuItem1::inRandomOrder()->first()->id,
            'quantity' => $this->faker->numberBetween(1, 5),
            'price' => $this->faker->randomFloat(200000, 100000, 500000),
        ];
    }
}
