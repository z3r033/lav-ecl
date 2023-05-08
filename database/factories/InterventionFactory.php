<?php

namespace Database\Factories;

use App\Models\Equipe;
use App\Models\PosteElectrique;
use App\Models\Secteur;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Intervention>
 */
class InterventionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'secteur_id' => Secteur::factory(),
            'poste_electrique_id' => PosteElectrique::factory(),
            'equipe_id' => Equipe::factory(),
            'type_intervention' => $this->faker->randomElement(['maintenance', 'inspection', 'urgence', 'autre']),
            'description' => $this->faker->sentence(),
            'date_intervention' => $this->faker->dateTime(),
            'duree' => $this->faker->numberBetween(1, 24),
            'statut' => $this->faker->randomElement(['planifié', 'en_cours', 'terminé', 'annulé']),
        ];

    }
}
