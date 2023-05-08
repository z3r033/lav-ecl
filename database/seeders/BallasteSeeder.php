<?php

namespace Database\Seeders;

use App\Models\Ballaste;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BallasteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Ballaste::factory()->count(10)->create();
    }
}
