<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up():void
    {
        Schema::create('coffret', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->unsignedBigInteger('poste_electrique_id')->nullable();
            $table->foreign('poste_electrique_id')->references('id')->on('poste_electrique');
            $table->enum('type', ['primaire', 'secondaire', 'tertiaire']);
            $table->date('date_installation');
            $table->date('date_derniere_maintenance')->nullable();
            $table->string('entreprise_maintenance')->nullable();
            $table->integer('puissance_maximale');
            $table->integer('nombre_circuits');
            $table->enum('etat', ['actif', 'inactif', 'maintenance', 'hors_service']);
            $table->timestamps();
        });
    }

    public function down():void
    {
        Schema::dropIfExists('coffret');
    }
};
