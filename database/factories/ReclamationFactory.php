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
            'utilisateur_id' => User::factory(),
            'equipe_id' => Equipe::factory(),
            'titre' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'date_creation' => $this->faker->dateTimeBetween('-2 years', 'now'),
            'date_modification' => $this->faker->dateTimeBetween('-2 years', 'now'),
            'statut' => $this->faker->randomElement($statuts)
            
        ];
    }
}
