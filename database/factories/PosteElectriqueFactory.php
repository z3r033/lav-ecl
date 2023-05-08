<?php

namespace Database\Factories;

use App\Models\Secteur;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PosteElectrique>
 */
class PosteElectriqueFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */


    public function definition(): array
    {
        return [
            //
            'nom' => $this->faker->word(),
            'secteur_id' => function () {
                return Secteur::factory()->create()->id;
            },
            'capacite' => $this->faker->numberBetween(100, 1000),
            'type' => $this->faker->randomElement(['HTA', 'BT']),
            'date_installation' => $this->faker->date(),
            'date_derniere_maintenance' => $this->faker->optional()->date(),
            'entreprise_maintenance' => $this->faker->optional()->word(),
            'equipements' => $this->faker->optional()->text(),
            'puissance_souscrite' => $this->faker->numberBetween(1000, 10000),
            'etat' => $this->faker->randomElement(['actif', 'inactif', 'maintenance', 'hors_service']),
        ];
    }
}
