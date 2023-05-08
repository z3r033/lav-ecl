<?php

namespace Database\Seeders;

use App\Models\BlocLed;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlocLedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        BlocLed::factory()->count(10)->create();
    }
}
