<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DatePlanning>
 */
class DatePlanningFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'planning_id' => \App\Models\Planning::factory()->create(),
            'date_debut' => $this->faker->dateTimeBetween('-1 week', '+1 week'),
            'date_fin' => $this->faker->dateTimeBetween('now', '+1 week'),
        ];
    }
}
