<?php

namespace Database\Factories;

use Faker\Core\DateTime;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class ProFamFactory extends Factory // Patrón para crear datos ficticios en nuestra base de datos. Generará instancias de un recurso o modelo.
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->sentence(),
            'desc' => fake()->paragraph(10),
            'image' => 'OrientaDefault.png',
            // función fake() devuelve diferentes tipos de valores ficticios.
        ];
    }
}
