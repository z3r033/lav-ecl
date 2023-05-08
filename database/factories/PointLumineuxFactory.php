<?php

namespace Database\Factories;

use App\Models\Voie;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PointLumineux>
 */
class PointLumineuxFactory extends Factory
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
            'voie_id' => function () {
                return Voie::factory()->create()->id;
            },
            'type_lampe' => $this->faker->randomElement(['led', 'halogene', 'fluorescente', 'autre']),
            'puissance' => $this->faker->numberBetween(10, 100),
            'angle_eclairage' => $this->faker->numberBetween(10, 180),
            'hauteur_montage' => $this->faker->randomFloat(1, 1, 10),
            'date_installation' => $this->faker->date(),
            'date_derniere_maintenance' => $this->faker->optional()->date(),
            'entreprise_maintenance' => $this->faker->optional()->word(),
            'coordonnees_gps' => $this->faker->optional()->latitude() . ',' . $this->faker->optional()->longitude(),
            'etat' => $this->faker->randomElement(['actif', 'inactif', 'maintenance', 'hors_service']),
        ];
    }
}
