<?php

namespace Database\Seeders;

use App\Models\Poteau;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PoteauTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Poteau::factory()->count(10)->create();
    }
}
