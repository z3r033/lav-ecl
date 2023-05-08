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
        Schema::create('intervention', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('secteur_id');
            $table->foreign('secteur_id')->references('id')->on('secteur')->onDelete('cascade');
            $table->unsignedBigInteger('poste_electrique_id');
            $table->foreign('poste_electrique_id')->references('id')->on('poste_electrique')->onDelete('cascade');
            $table->unsignedBigInteger('equipe_id');
            $table->foreign('equipe_id')->references('id')->on('equipe')->onDelete('cascade');
            $table->enum('type_intervention', ['maintenance', 'inspection', 'urgence', 'autre']);
            $table->text('description');
            $table->date('date_intervention');
            $table->integer('duree');
            $table->enum('statut', ['planifié', 'en_cours', 'terminé', 'annulé']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('intervention');
    }
};
