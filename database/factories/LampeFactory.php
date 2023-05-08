<?php

namespace Database\Factories;

use App\Models\Shp;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lampe>
 */
class LampeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //'SHP_id' => $this->faker->numberBetween(1, 100),
            'SHP_id' => function () {
                return Shp::factory()->create()->id;
              },
            'type' => $this->faker->word,
            'puissance' => $this->faker->numberBetween(1, 100),
            'tension_nominal' => $this->faker->numberBetween(1, 100),
            'courant_nominal' => $this->faker->numberBetween(1, 100),
            'indice_IP' => $this->faker->numberBetween(1, 100),
            'duree_vie' => $this->faker->numberBetween(1, 100),
            'date_installation' => $this->faker->date(),
            'date_derniere_maintenance' => $this->faker->date(),
            'entreprise_maintenance' => $this->faker->company,
            'etat' => $this->faker->randomElement(['actif', 'inactif', 'maintenance', 'hors_service']),
        ];
    }
}
