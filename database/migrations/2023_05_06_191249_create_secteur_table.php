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
        Schema::create('secteur', function (Blueprint $table) {
            $table->id();
            $table->string('nom_secteur');
            $table->string('ville');
            $table->string('adresse');
            $table->enum('type_secteur', ['résidentiel', 'commercial', 'industriel', 'public']);
            $table->integer('nombre_points_lumineux');
            $table->integer('puissance_totale');
            $table->string('type_lampe');
            $table->date('date_installation');
            $table->date('date_derniere_maintenance')->nullable();
            $table->string('entreprise_maintenance')->nullable();
            $table->timestamps();
        });
    }

    public function down():void
    {
        Schema::dropIfExists('secteur');
    }
};