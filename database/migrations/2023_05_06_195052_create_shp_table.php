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
        Schema::create('shp', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('luminaire_id');
            $table->foreign('luminaire_id')->references('id')->on('luminaire');
            $table->integer('hauteur_fixation');
            $table->integer('puissance_installee');
            $table->integer('flux_lumineux_initial');
            $table->integer('angle_eclairage');
            $table->integer('IRC');
            $table->integer('duree_vie');
            $table->integer('efficacite_lumineuse');
            $table->integer('indice_IP');
            $table->date('date_installation');
            $table->date('date_derniere_maintenance')->nullable();
            $table->string('entreprise_maintenance')->nullable();
            $table->enum('etat', ['actif', 'inactif', 'maintenance', 'hors_service']);
            $table->float('latitude', 10, 6);
            $table->float('longitude', 10, 6);
            $table->string('modele_sph');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shp');
    }
};
