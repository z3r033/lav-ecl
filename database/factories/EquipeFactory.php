<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Equipe>
 */
class EquipeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom' => $this->faker->name,
            'description' => $this->faker->paragraph,
            'date_creation' => now(),
            'created_at'=> $this->faker->dateTimeThisMonth(),
            'updated_at'=> $this->faker->dateTimeThisMonth(),
        ];
    }
}
