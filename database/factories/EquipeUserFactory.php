<?php

namespace Database\Factories;

use App\Models\Equipe;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EquipeUser>
 */
class EquipeUserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'equipe_id' => Equipe::factory(),
            'user_id' => User::factory(),
        ];
    }
}
