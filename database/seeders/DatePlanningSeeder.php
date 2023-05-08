<?php

namespace Database\Seeders;

use App\Models\DatePlanning;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatePlanningSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DatePlanning::factory()->count(10)->create();
    }
}
