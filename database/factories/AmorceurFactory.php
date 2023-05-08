<?php

namespace Database\Factories;

use App\Models\Shp;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Amorceur>
 */
class AmorceurFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'shp_id' => function () {
                return Shp::factory()->create()->id;
            },
            'type' => $this->faker->word,
            'puissance' => $this->faker->randomNumber(),
            'tension_nominal' => $this->faker->randomNumber(),
            'courant_nominal' => $this->faker->randomNumber(),
            'indice_IP' => $this->faker->randomNumber(),
            'duree_vie' => $this->faker->randomNumber(),
            'date_installation' => $this->faker->date(),
            'date_derniere_maintenance' => $this->faker->date(),
            'entreprise_maintenance' => $this->faker->company,
            'etat' => $this->faker->randomElement(['actif', 'inactif', 'maintenance', 'hors_service']),
        ];
    }
}
