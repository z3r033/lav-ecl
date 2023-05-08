<?php

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
        Schema::create('table_jupe', function (Blueprint $table) {
            $table->id();
            $table->string('type_table_jupe');
            $table->unsignedBigInteger('points_lumineux_id');
            $table->foreign('points_lumineux_id')->references('id')->on('points_lumineux');
            $table->string('materiau');
            $table->string('couleur')->nullable();
            $table->string('forme');
            $table->string('dimensions');
            $table->string('poids');
            $table->integer('indice_IP');
            $table->date('date_installation');
            $table->date('date_derniere_maintenance')->nullable();
            $table->string('entreprise_maintenance')->nullable();
            $table->string('etat', 50);
            $table->timestamps();
        });  
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_jupe');
    }
};
