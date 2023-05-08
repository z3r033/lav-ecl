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
        Schema::create('bloc_led', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('led_id');
            $table->foreign('led_id')->references('id')->on('led');
            $table->integer('puissance');
            $table->integer('flux_lumineux');
            $table->integer('temp_couleur');
            $table->integer('angle_eclairage');
            $table->integer('IRC');
            $table->integer('duree_vie');
            $table->integer('efficacite_lumineuse');
            $table->integer('indice_IP');
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
        Schema::dropIfExists('bloc_led');
    }
};
