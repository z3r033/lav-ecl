<?php

namespace Database\Factories;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Support>
 */
class SupportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        {
            $latitude = $this->faker->latitude(48.8, 48.9);
            $longitude = $this->faker->longitude(2.3, 2.4);

            return [
                'points_lumineux_id' => null,
                'type_support' => $this->faker->randomElement(['candelabre', 'poteau', 'mur']),
                'hauteur' => $this->faker->randomFloat(2, 1, 10),
                'diametre' => $this->faker->randomFloat(2, 0.5, 2),
                'resistance_vent' => $this->faker->numberBetween(50, 200),
                'couleur' => $this->faker->optional()->colorName,
                'date_installation' => $this->faker->date(),
                'date_derniere_maintenance' => $this->faker->optional()->date(),
                'entreprise_maintenance' => $this->faker->optional()->company,
                'coordonnees_gps' => $latitude . ', ' . $longitude,
                'etat' => $this->faker->randomElement(['actif', 'inactif', 'maintenance', 'hors_service']),
                'geom' => DB::raw("ST_PointFromText('POINT($longitude $latitude)')"),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
    }
}
