<?php

namespace Database\Factories;

use App\Models\Luminaire;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Led>
 */
class LedFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
          //  'luminaire_id' => $this->faker->numberBetween(1, 50),
          'luminaire_id' => function () {
            return Luminaire::factory()->create()->id;
        },
            'puissance' => $this->faker->numberBetween(1, 100),
            'flux_lumineux' => $this->faker->numberBetween(1, 1000),
            'temp_couleur' => $this->faker->numberBetween(1, 5000),
            'angle_eclairage' => $this->faker->numberBetween(1, 180),
            'IRC' => $this->faker->numberBetween(1, 100),
            'duree_vie' => $this->faker->numberBetween(1000, 10000),
            'efficacite_lumineuse' => $this->faker->numberBetween(1, 100),
            'indice_IP' => $this->faker->numberBetween(1, 5),
            'date_installation' => $this->faker->date(),
            'date_derniere_maintenance' => $this->faker->date(),
            'entreprise_maintenance' => $this->faker->company(),
            'etat' => $this->faker->randomElement(['actif', 'inactif', 'maintenance', 'hors_service'])
        ];
    }
}
