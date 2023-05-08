<?php

namespace Database\Seeders;

use App\Models\Douille;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DouilleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Douille::factory()
        ->count(10)
        ->create();
    }
    
}
