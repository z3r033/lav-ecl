<?php

namespace Database\Seeders;

use App\Models\PosteElectrique;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PosteElectriqueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        PosteElectrique::factory()->count(10)->create();
    }
}
