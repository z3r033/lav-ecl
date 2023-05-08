<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TableJupe>
 */
class TableJupeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type_table_jupe' => $this->faker->word,
            'points_lumineux_id' => rand(1, 50),
            'materiau' => $this->faker->word,
            'couleur' => $this->faker->colorName,
            'forme' => $this->faker->word,
            'dimensions' => $this->faker->word,
            'poids' => $this->faker->word,
            'indice_IP' => $this->faker->numberBetween(0, 10),
            'date_installation' => $this->faker->date(),
            'date_derniere_maintenance' => $this->faker->optional()->date(),
            'entreprise_maintenance' => $this->faker->optional()->company,
            'etat' => $this->faker->randomElement(['actif', 'inactif', 'maintenance', 'hors_service']),
        ];
    }
}
