<?php

namespace Database\Factories;

use App\Models\Secteur;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Voie>
 */
class VoieFactory extends Factory
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
            'secteur_id' => function () {
                return Secteur::factory()->create()->id;
            },
            'type_voie' => $this->faker->randomElement(['principale', 'secondaire', 'tertiaire']),
            'code_postal' => $this->faker->postcode(),
            'nombre_points_lumineux' => $this->faker->numberBetween(1, 50),
            'puissance_totale' => $this->faker->numberBetween(100, 1000),
            'type_lampe' => $this->faker->randomElement(['led', 'halogene', 'fluorescente', 'autre']),
            'date_installation' => $this->faker->date(),
            'date_derniere_maintenance' => $this->faker->optional()->date(),
            'entreprise_maintenance' => $this->faker->optional()->word(),
            'coordonnees_gps' => $this->faker->optional()->latitude() . ',' . $this->faker->optional()->longitude(),
            'etat' => $this->faker->randomElement(['actif', 'inactif', 'maintenance', 'hors_service']),
        ];
    }
}
