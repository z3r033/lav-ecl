<?php

namespace Database\Factories;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserRoles>
 */
class UserRoleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
         //   'user_id' => User ::factory(),
         //   'role_id' => Role::factory(),
         'user_id' => $this->faker->unique()->numberBetween(1, 10),
         'role_id' => $this->faker->randomElement([1, 2, 3, 4]),
        ];
    }
}
