<?php

namespace Database\Seeders;

use App\Models\Amorceur;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AmorceurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Amorceur::factory()->count(10)->create();
    }
}
