<?php

namespace Database\Factories;

use App\Models\PointLumineux;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Console>
 */
class ConsoleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type_console' => $this->faker->word,
            'points_lumineux_id' => PointLumineux::factory(),
            'marque' => $this->faker->word,
            'modele' => $this->faker->word,
            'nombre_canal' => $this->faker->randomNumber(),
            'protocole_supporte' => $this->faker->word,
            'tension_alimentation' => $this->faker->randomNumber(),
            'courant_max' => $this->faker->randomNumber(),
            'type_interface' => $this->faker->word,
            'adresse_IP' => $this->faker->ipv4,
            'adresse_MAC' => $this->faker->macAddress,
            'date_installation' => $this->faker->date(),
            'date_derniere_maintenance' => $this->faker->date(),
            'entreprise_maintenance' => $this->faker->word,
            'etat' => $this->faker->randomElement(['actif', 'inactif', 'maintenance', 'hors_service']),
        ];
    }
}
