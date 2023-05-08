<?php

namespace Database\Factories;
use App\Models\Secteur;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Secteur>
 */
class SecteurFactory extends Factory
{
  
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {
        
        return [
            'nom_secteur' => $this->faker->word,
            'ville' => $this->faker->city,
            'adresse' => $this->faker->address,
            'type_secteur' => $this->faker->randomElement(['résidentiel', 'commercial', 'industriel', 'public']),
            'nombre_points_lumineux' => $this->faker->numberBetween(1, 100),
            'puissance_totale' => $this->faker->numberBetween(100, 1000),
            'type_lampe' => $this->faker->word,
            'date_installation' => $this->faker->dateTimeThisMonth(),
            'date_derniere_maintenance' => $this->faker->dateTimeThisMonth(),
            'entreprise_maintenance' => $this->faker->company,
        ];
    }
}
