<?php

namespace Database\Seeders;

use App\Models\DateOrdreIntervention;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DateOrdreInterventionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DateOrdreIntervention::factory()->count(10)->create();
    }
}
