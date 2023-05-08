<?php

namespace Database\Factories;

use App\Models\Shp;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Douille>
 */
class DouilleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'SHP_id' => function () {
                return Shp::factory()->create()->id;
            },
            'type' => $this->faker->text(255),
            'puissance_max' => $this->faker->randomNumber(),
            'tension_nominal' => $this->faker->randomNumber(),
            'courant_nominal' => $this->faker->randomNumber(),
            'indice_IP' => $this->faker->randomNumber(),
            'date_installation' => $this->faker->dateTime(),
            'date_derniere_maintenance' => $this->faker->dateTime(),
            'entreprise_maintenance' => $this->faker->text(255),
            'etat' => $this->faker->randomElement(['actif', 'inactif', 'maintenance', 'hors_service']),
        ];
    }
}
