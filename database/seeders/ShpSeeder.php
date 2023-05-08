<?php

namespace Database\Seeders;

use App\Models\Shp;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Shp::factory()
            ->count(10)
            ->create();
    }
}
