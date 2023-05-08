<?php

namespace Database\Factories;

use App\Models\Led;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sdp>
 */
class SdpFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
          //  'led_id' => Led::factory(),
          'led_id' => function () {
            return Led::factory()->create()->id;
        },
            'date_adoption' => $this->faker->date(),
            'ville' => $this->faker->city(),
            'objectifs' => $this->faker->paragraph(),
            'strategies' => $this->faker->paragraph(),
            'actions' => $this->faker->paragraph(),
            'couts' => $this->faker->randomNumber(5),
            'echeanciers' => $this->faker->paragraph(),
            'responsable' => $this->faker->name(),
        ];
    }
}
