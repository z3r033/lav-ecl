<?php

namespace Database\Factories;

use App\Models\Led;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Driver>
 */
class DriverFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'led_id' => function () {
                return Led::factory()->create()->id;
            },
            'puissance_entree' => $this->faker->numberBetween(1, 1000),
            'tension_entree' => $this->faker->numberBetween(1, 100),
            'courant_sortie' => $this->faker->numberBetween(1, 1000),
            'tension_sortie' => $this->faker->numberBetween(1, 100),
            'efficacite' => $this->faker->numberBetween(1, 100),
            'facteur_puissance' => $this->faker->numberBetween(1, 100),
            'indice_protection' => $this->faker->numberBetween(1, 100),
            'temperature_fonctionnement' => $this->faker->word,
            'date_installation' => $this->faker->date(),
            'date_derniere_maintenance' => $this->faker->date(),
            'entreprise_maintenance' => $this->faker->company,
            'etat' => $this->faker->randomElement(['actif', 'inactif', 'maintenance', 'hors_service'])
        ];
    }
}
