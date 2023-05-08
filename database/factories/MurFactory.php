<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mur>
 */
class MurFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'hauteur' => $this->faker->randomFloat(2, 2, 10),
            'support_id' => null,
            'longueur' => $this->faker->randomFloat(2, 2, 10),
            'epaisseur' => $this->faker->randomFloat(2, 0.1, 1),
            'materiau' => $this->faker->randomElement(['beton', 'bois', 'brique', 'pierre', 'autre']),
            'couleur' => $this->faker->safeColorName,
            'date_installation' => $this->faker->date(),
            'date_derniere_maintenance' => null,
            'entreprise_maintenance' => null,
            'coordonnees_gps' => null,
            'etat' => $this->faker->randomElement(['actif', 'inactif', 'maintenance', 'hors_service']),
        ];
    }
}
