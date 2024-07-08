<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\order>
 */
class orderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Menghasilkan waktu secara acak dalam rentang 1 tahun terakhir
        $randomDateTime = Carbon::now()->subDays(rand(0, 180))->subMinutes(rand(0, 1440));

        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'table_number' => $this->faker->randomNumber(1),
            'total_price' => $this->faker->randomFloat(200000, 100000, 500000),
            'status' => $this->faker->randomElement(['pending', 'processing', 'completed', 'cancelled']),
            'created_at' => $randomDateTime,
            'updated_at' => $randomDateTime,
        ];
    }
}
