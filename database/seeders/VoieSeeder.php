<?php

namespace Database\Seeders;

use App\Models\Voie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VoieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Voie::factory()->count(10)->create();
    }
}
