<?php

namespace Database\Seeders;

use App\Models\Candelabre;
use App\Models\Support;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CandelabreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $supports = Support::all();

        foreach ($supports as $support) {
            Candelabre::factory()
                ->count(5)
                ->create([
                    'support_id' => $support->id,
                ]);
        }
    }
}
