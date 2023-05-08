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
        Schema::create('poste_electrique', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->unsignedBigInteger('secteur_id');
            $table->foreign('secteur_id')->references('id')->on('secteur')->onDelete('cascade');
            $table->integer('capacite');
            $table->enum('type', ['HTA', 'BT']);
            $table->date('date_installation');
            $table->date('date_derniere_maintenance')->nullable();
            $table->string('entreprise_maintenance')->nullable();
            $table->text('equipements')->nullable();
            $table->integer('puissance_souscrite');
            $table->enum('etat', ['actif', 'inactif', 'maintenance', 'hors_service']);
            $table->timestamps();
        });
    }

    public function down():void
    {
        Schema::dropIfExists('poste_electrique');
    }
};