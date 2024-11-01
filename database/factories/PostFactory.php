<?php

namespace Database\Factories;

use Faker\Core\DateTime;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory // Patrón para crear datos ficticios en nuestra base de datos. Generará instancias de un recurso o modelo.
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => fake()->numberBetween(1,50),
            'title' => fake()->sentence(),
            'body' => fake()->paragraph(10),
            'created_at' => fake()->dateTimeThisMonth(),
            // función fake() devuelve diferentes tipos de valores ficticios.
        ];
    }
}
