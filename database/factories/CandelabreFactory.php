<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Candelabre>
 */
class CandelabreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'hauteur' => $this->faker->randomFloat(2, 5, 10),
            'diametre' => $this->faker->randomFloat(2, 0.5, 1.5),
            'nombre_lampes' => $this->faker->numberBetween(1, 5),
            'type_lampes' => $this->faker->randomElement(['led', 'halogene', 'fluorescente', 'autre']),
            'puissance' => $this->faker->numberBetween(50, 300),
            'angle_eclairage' => $this->faker->numberBetween(30, 180),
            'date_installation' => $this->faker->dateTimeBetween('-5 years', 'now')->format('Y-m-d'),
            'etat' => $this->faker->randomElement(['actif', 'inactif', 'maintenance', 'hors_service']),
        ];
    }
}
