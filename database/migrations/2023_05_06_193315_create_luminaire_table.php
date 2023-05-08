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
            Schema::create('luminaire', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('points_lumineux_id');
                $table->foreign('points_lumineux_id')->references('id')->on('points_lumineux');
                $table->enum('type', ['projecteur', 'suspension', 'applique', 'autre']);
                $table->integer('puissance');
                $table->integer('flux_lumineux');
                $table->integer('angle_eclairage');
                $table->string('couleur_lumiere', 50);
                $table->float('hauteur');
                $table->date('date_installation');
                $table->date('date_derniere_maintenance')->nullable();
                $table->string('entreprise_maintenance')->nullable();
                $table->string('etat', 50);
                $table->timestamps();
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('luminaire');
    }
};
