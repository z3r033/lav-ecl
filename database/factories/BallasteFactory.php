<?php

namespace Database\Factories;

use App\Models\Shp;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ballaste>
 */
class BallasteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type' => $this->faker->word(),
            'puissance' => $this->faker->numberBetween(1, 100),
            'tension_nominal' => $this->faker->numberBetween(10, 100),
            'courant_nominal' => $this->faker->numberBetween(1, 10),
            'indice_IP' => $this->faker->numberBetween(1, 5),
            'duree_vie' => $this->faker->numberBetween(1000, 5000),
            'date_installation' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'date_derniere_maintenance' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'entreprise_maintenance' => $this->faker->company(),
            'etat' => $this->faker->randomElement(['actif', 'inactif', 'maintenance', 'hors_service']),
            'SHP_id' => function () {
                return Shp::factory()->create()->id;
            },
        ];
    }
}
