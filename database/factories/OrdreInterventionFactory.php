<?php

namespace Database\Factories;

use App\Models\Equipe;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrdreIntervention>
 */
class OrdreInterventionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $equipe = Equipe::factory()->create();
        $utilisateur = User::factory()->create();
        return [
            'utilisateur_id' => $utilisateur->id,
            'equipe_id' => $equipe->id,
            'description' => $this->faker->paragraph,
            'statut' => $this->faker->randomElement(['en_attente', 'en_cours', 'termine']),
        ];
    }
}
