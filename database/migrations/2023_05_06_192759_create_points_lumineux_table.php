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
        Schema::create('points_lumineux', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->unsignedBigInteger('voie_id')->nullable();
            $table->foreign('voie_id')->references('id')->on('voie');
            $table->enum('type_lampe', ['led', 'halogene', 'fluorescente', 'autre']);
            $table->integer('puissance');
            $table->integer('angle_eclairage');
            $table->float('hauteur_montage');
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
        Schema::dropIfExists('points_lumineux');
    }
};
