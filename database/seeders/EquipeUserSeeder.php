<?php

namespace Database\Seeders;

use App\Models\EquipeUser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EquipeUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        EquipeUser::factory()->count(50)->create();
    }
}
