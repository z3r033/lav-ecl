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
        Schema::create('lampe', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('SHP_id');
            $table->foreign('SHP_id')->references('id')->on('shp');
            $table->string('type', 255)->nullable(false);
            $table->integer('puissance')->nullable(false);
            $table->integer('tension_nominal')->nullable(false);
            $table->integer('courant_nominal')->nullable(false);
            $table->integer('indice_IP')->nullable(false);
            $table->integer('duree_vie')->nullable(false);
            $table->date('date_installation')->nullable(false);
            $table->date('date_derniere_maintenance')->nullable();
            $table->string('entreprise_maintenance', 255)->nullable();
            $table->enum('etat', ['actif', 'inactif', 'maintenance', 'hors_service'])->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lampe');
    }
};
