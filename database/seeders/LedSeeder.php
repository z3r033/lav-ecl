<?php

namespace Database\Seeders;

use App\Models\Led;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Led::factory()->count(50)->create();
    }
}
