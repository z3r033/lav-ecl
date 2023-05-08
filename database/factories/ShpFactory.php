<?php

namespace Database\Factories;

use App\Models\Luminaire;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Shp>
 */
class ShpFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'luminaire_id' => function () {
                return Luminaire::factory()->create()->id;
            },
            'hauteur_fixation' => $this->faker->numberBetween(3, 10),
            'puissance_installee' => $this->faker->numberBetween(20, 200),
            'flux_lumineux_initial' => $this->faker->numberBetween(2000, 10000),
            'angle_eclairage' => $this->faker->numberBetween(30, 90),
            'IRC' => $this->faker->numberBetween(60, 90),
            'duree_vie' => $this->faker->numberBetween(10000, 50000),
            'efficacite_lumineuse' => $this->faker->numberBetween(80, 120),
            'indice_IP' => $this->faker->numberBetween(40, 67),
            'date_installation' => $this->faker->date(),
            'date_derniere_maintenance' => $this->faker->date(),
            'entreprise_maintenance' => $this->faker->company(),
            'etat' => $this->faker->randomElement(['actif', 'inactif', 'maintenance', 'hors_service']),
            'latitude' => $this->faker->latitude(),
            'longitude' => $this->faker->longitude(),
            'modele_sph' => $this->faker->word(),
        ];
    }
}
