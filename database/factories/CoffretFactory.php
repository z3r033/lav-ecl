<?php

namespace Database\Factories;

use App\Models\PosteElectrique;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Coffret>
 */
class CoffretFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom' => $this->faker->word(),
            'poste_electrique_id' => function () {
                return PosteElectrique::factory()->create()->id;
            },
            'type' => $this->faker->randomElement(['primaire', 'secondaire', 'tertiaire']),
            'date_installation' => $this->faker->date(),
            'date_derniere_maintenance' => $this->faker->optional()->date(),
            'entreprise_maintenance' => $this->faker->optional()->word(),
            'puissance_maximale' => $this->faker->numberBetween(100, 1000),
            'nombre_circuits' => $this->faker->numberBetween(1, 10),
            'etat' => $this->faker->randomElement(['actif', 'inactif', 'maintenance', 'hors_service']),
        ];
    }
}
