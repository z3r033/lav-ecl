<?php

namespace Database\Seeders;

use App\Models\Lampe;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LampeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Lampe::factory()->count(50)->create();
    }
}
