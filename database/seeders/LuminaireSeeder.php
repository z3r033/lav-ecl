<?php

namespace Database\Seeders;

use App\Models\Luminaire;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LuminaireSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Luminaire::factory()->count(10)->create();
    }
}
