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
        Schema::create('candelabre', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('support_id')->nullable();
            $table->foreign('support_id')->references('id')->on('support');
            $table->float('hauteur');
            $table->float('diametre');
            $table->integer('nombre_lampes');
            $table->enum('type_lampes', ['led', 'halogene', 'fluorescente', 'autre']);
            $table->integer('puissance');
            $table->integer('angle_eclairage');
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
        Schema::dropIfExists('candelabre');
    }
};
