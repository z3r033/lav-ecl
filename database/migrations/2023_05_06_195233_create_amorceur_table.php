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
        Schema::create('amorceur', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('shp_id');
            $table->foreign('shp_id')->references('id')->on('shp');
            $table->string('type');
            $table->integer('puissance');
            $table->integer('tension_nominal');
            $table->integer('courant_nominal');
            $table->integer('indice_IP');
            $table->integer('duree_vie');
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
        Schema::dropIfExists('amorceur');
    }
};
