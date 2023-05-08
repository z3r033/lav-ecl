<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Support>
 */
class SupportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'points_lumineux_id' => null,
            'type_support' => $this->faker->randomElement(['candelabre', 'poteau', 'mur']),
            'hauteur' => $this->faker->randomFloat(2, 1, 20),
            'diametre' => $this->faker->randomFloat(2, 0.5, 2),
            'resistance_vent' => $this->faker->numberBetween(100, 200),
            'couleur' => $this->faker->randomElement(['blanc', 'noir', 'gris', null]),
            'date_installation' => $this->faker->date(),
            'date_derniere_maintenance' => $this->faker->date(),
            'entreprise_maintenance' => $this->faker->company(),
            'coordonnees_gps' => $this->faker->latitude() . ',' . $this->faker->longitude(),
            'etat' => $this->faker->randomElement(['actif', 'inactif', 'maintenance', 'hors_service']),
        ];
    }
}
