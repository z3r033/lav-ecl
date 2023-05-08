<?php

namespace Database\Seeders;

use App\Models\TableJupe;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TableJupeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        TableJupe::factory()
        ->count(50)
        ->create();
    }
}
