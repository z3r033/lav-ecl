<?php

namespace Database\Seeders;

use App\Models\ProprietesArticle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProprietesArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        ProprietesArticle::factory()->count(50)->create();
    }
}
