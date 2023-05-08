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
        Schema::create('driver', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('led_id');
            $table->foreign('led_id')->references('id')->on('led');
            $table->integer('puissance_entree');
            $table->integer('tension_entree');
            $table->integer('courant_sortie');
            $table->integer('tension_sortie');
            $table->integer('efficacite');
            $table->integer('facteur_puissance');
            $table->integer('indice_protection');
            $table->string('temperature_fonctionnement', 50);
            $table->date('date_installation');
            $table->date('date_derniere_maintenance')->nullable();
            $table->string('entreprise_maintenance')->nullable();
            $table->enum('etat', ['actif', 'inactif', 'maintenance', 'hors_service']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('driver');
    }
};
