<?php

namespace Database\Factories;

use App\Models\OrdreIntervention;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DateOrdreIntervention>
 */
class DateOrdreInterventionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'ordre_intervention_id' => function () {
                return OrdreIntervention::factory()->create()->id;
            },
            'date_debut' => $this->faker->date(),
            'date_fin' => $this->faker->date(),
        ];
    }
}
