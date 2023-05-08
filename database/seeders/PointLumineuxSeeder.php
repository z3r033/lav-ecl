<?php

namespace Database\Seeders;

use App\Models\PointLumineux;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PointLumineuxSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        PointLumineux::factory()->count(10)->create();
    }
}
