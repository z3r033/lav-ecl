<?php

namespace Database\Seeders;

use App\Models\OrdreIntervention;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrdreInterventionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        OrdreIntervention::factory()->count(10)->create();
    }
}
