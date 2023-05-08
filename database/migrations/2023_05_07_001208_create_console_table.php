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
        Schema::create('console', function (Blueprint $table) {
            $table->id();
            $table->string('type_console');
            $table->unsignedBigInteger('points_lumineux_id');
            $table->foreign('points_lumineux_id')->references('id')->on('points_lumineux');
            $table->string('marque');
            $table->string('modele');
            $table->integer('nombre_canal');
            $table->string('protocole_supporte');
            $table->integer('tension_alimentation');
            $table->integer('courant_max');
            $table->string('type_interface');
            $table->string('adresse_IP')->nullable();
            $table->string('adresse_MAC')->nullable();
            $table->date('date_installation');
            $table->date('date_derniere_maintenance')->nullable();
            $table->string('entreprise_maintenance')->nullable();
            $table->string('etat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('console');
    }
};
