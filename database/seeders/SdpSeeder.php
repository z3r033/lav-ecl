<?php

namespace Database\Seeders;

use App\Models\Sdp;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SdpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Sdp::factory()
        ->count(50)
        ->create();
    }
}
