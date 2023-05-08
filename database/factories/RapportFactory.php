<?php

namespace Database\Factories;

use App\Models\Intervention;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rapport>
 */
class RapportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'intervention_id' => Intervention::factory(),
            'contenu' => $this->faker->paragraphs(3, true),
            'recommandations' => $this->faker->paragraphs(2, true),
            'date_creation' => $this->faker->dateTimeBetween('-1 year', 'now')
        ];
    }
}
