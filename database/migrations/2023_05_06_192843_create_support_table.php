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
        Schema::create('support', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('points_lumineux_id')->nullable();
            $table->foreign('points_lumineux_id')->references('id')->on('points_lumineux');
            $table->enum('type_support', ['candelabre', 'poteau', 'mur']);
            $table->float('hauteur');
            $table->float('diametre');
            $table->integer('resistance_vent');
            $table->string('couleur', 50)->nullable();
            $table->date('date_installation');
            $table->date('date_derniere_maintenance')->nullable();
            $table->string('entreprise_maintenance')->nullable();
            $table->string('coordonnees_gps', 50)->nullable();
            $table->enum('etat', ['actif', 'inactif', 'maintenance', 'hors_service']);
            $table->point('geom', '4326')->nullable(false);
            $table->timestamps();
        });
        DB::statement('ALTER TABLE support ADD SPATIAL INDEX sidx_support_geom (geom)');
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('support');
    }
};
