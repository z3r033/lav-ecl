<?php

namespace Database\Factories;

use App\Models\Equipe;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reclamation>
 */
class ReclamationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $statuts = ['ouverte', 'en_cours', 'resolue', 'fermee'];

        return [
            'utilisateur_id' => $this->faker->numberBetween(1, 10),
            'equipe_id' => $this->faker->numberBetween(1, 5),
            'secteur_id' => $this->faker->numberBetween(1, 10),
            'titre' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'statut' => $this->faker->randomElement(['ouverte', 'en_cours', 'resolue', 'fermee']),
            'source_defaillance' => $this->faker->word(),
            'etat_signalement' => $this->faker->word(),
        ];
    }
}
