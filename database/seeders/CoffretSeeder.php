<?php

namespace Database\Seeders;

use App\Models\Coffret;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CoffretSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Coffret::factory()->count(10)->create();
    }
}
