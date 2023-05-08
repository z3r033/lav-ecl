<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('type_article', function (Blueprint $table) {
            $table->id();
            $table->string('type_nom');
            $table->timestamps();
        });

        DB::table('type_article')->insert([
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

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('type_article');
    }
};
