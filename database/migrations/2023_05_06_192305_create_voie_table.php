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
        Schema::create('voie', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->unsignedBigInteger('secteur_id')->nullable();
            $table->foreign('secteur_id')->references('id')->on('secteur');
            $table->enum('type_voie', ['principale', 'secondaire', 'tertiaire']);
            $table->string('code_postal', 10);
            $table->integer('nombre_points_lumineux');
            $table->integer('puissance_totale');
            $table->enum('type_lampe', ['led', 'halogene', 'fluorescente', 'autre']);
            $table->date('date_installation');
            $table->date('date_derniere_maintenance')->nullable();
            $table->string('entreprise_maintenance')->nullable();
            $table->string('coordonnees_gps', 50)->nullable();
            $table->enum('etat', ['actif', 'inactif', 'maintenance', 'hors_service']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('voie');
    }
};
