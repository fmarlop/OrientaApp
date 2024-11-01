<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Premium>
 */
class PremiumFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $isActive = fake()->boolean();
        $startDate = $isActive ? fake()->dateTimeThisMonth() : fake()->dateTimeThisYear();
        $endDate = (clone $startDate)->modify('+30 days');

        return [
            'user_id' => fake()->unique()->numberBetween(1,50),
            'is_active' => $isActive,
            'start_date' => $startDate,
            'end_date' => $endDate,
            'months' => fake()->numberBetween(1, 5),
            'created_at' => fake()->dateTimeThisYear(),

            // función fake() devuelve diferentes tipos de valores ficticios.
        ];
    }
}
