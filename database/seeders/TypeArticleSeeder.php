<?php

namespace Database\Seeders;

use App\Models\TypeArticle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        TypeArticle::insert([
            ['type_nom' => 'candelabre'],
            ['type_nom' => 'poteau'],
            ['type_nom' => 'mur'],
            ['type_nom' => 'LED'],
            ['type_nom' => 'SHP'],
            ['type_nom' => 'Amorceur'],
            ['type_nom' => 'ballaste'],
            ['type_nom' => 'lampe'],
            ['type_nom' => 'douille']
        ]);
    }
}
