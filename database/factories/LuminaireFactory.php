<?php

namespace Database\Factories;

use App\Models\PointLumineux;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Luminaire>
 */
class LuminaireFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
           // 'points_lumineux_id' => $this->faker->numberBetween(1, 50),
           'points_lumineux_id' => function () {
            return PointLumineux::factory()->create()->id;
          },
            'type' => $this->faker->randomElement(['projecteur', 'suspension', 'applique', 'autre']),
            'puissance' => $this->faker->numberBetween(10, 100),
            'flux_lumineux' => $this->faker->numberBetween(500, 5000),
            'angle_eclairage' => $this->faker->numberBetween(10, 180),
            'couleur_lumiere' => $this->faker->colorName(),
            'hauteur' => $this->faker->randomFloat(2, 1, 10),
            'date_installation' => $this->faker->date(),
            'date_derniere_maintenance' => $this->faker->optional()->date(),
            'entreprise_maintenance' => $this->faker->optional()->company(),
            'etat' => $this->faker->randomElement(['allumé', 'éteint', 'en panne']),
        ];
    }
}
