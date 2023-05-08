<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Poteau>
 */
class PoteauFactory extends Factory
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
            'diametre' => $this->faker->randomFloat(2, 0.1, 1),
            'materiau' => $this->faker->randomElement(['acier', 'aluminium', 'bois', 'composite', 'autre']),
            'resistance_vent' => $this->faker->numberBetween(0, 200),
            'couleur' => $this->faker->randomElement(['rouge', 'bleu', 'jaune', null]),
            'date_installation' => $this->faker->dateTimeBetween('-5 years', 'now'),
            'date_derniere_maintenance' => $this->faker->dateTimeBetween('-5 years', 'now'),
            'entreprise_maintenance' => $this->faker->company,
            'coordonnees_gps' => $this->faker->latitude() . ',' . $this->faker->longitude(),
            'etat' => $this->faker->randomElement(['actif', 'inactif', 'maintenance', 'hors_service']),
            'support_id' => null, // replace with appropriate support ID if needed
        ];
    }
}
