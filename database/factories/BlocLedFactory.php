<?php

namespace Database\Factories;

use App\Models\Led;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BlocLed>
 */
class BlocLedFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
       
        return [
            'led_id' => function () {
                return Led::factory()->create()->id;
            },
            'puissance' => $this->faker->randomNumber(3),
            'flux_lumineux' => $this->faker->randomNumber(4),
            'temp_couleur' => $this->faker->randomNumber(3),
            'angle_eclairage' => $this->faker->numberBetween(30, 180),
            'IRC' => $this->faker->numberBetween(70, 90),
            'duree_vie' => $this->faker->randomNumber(5),
            'efficacite_lumineuse' => $this->faker->numberBetween(80, 100),
            'indice_IP' => $this->faker->numberBetween(0, 8),
            'date_installation' => $this->faker->dateTimeBetween('-5 years', 'now'),
            'date_derniere_maintenance' => $this->faker->dateTimeBetween('-5 years', 'now'),
            'entreprise_maintenance' => $this->faker->company(),
            'etat' => $this->faker->randomElement(['actif', 'inactif', 'maintenance', 'hors_service'])
        ];
    }
}
