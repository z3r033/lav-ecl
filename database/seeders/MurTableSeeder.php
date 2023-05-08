<?php

namespace Database\Seeders;

use App\Models\Mur;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MurTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Mur::factory()->count(10)->create();
    }
}
