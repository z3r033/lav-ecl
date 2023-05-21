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
            $table->string('adresse')->nullable();
            $table->enum('type_secteur', ['résidentiel', 'commercial', 'industriel', 'public']);
            $table->integer('nombre_points_lumineux')->nullable();
            $table->integer('puissance_totale')->nullable();
            $table->string('type_lampe')->nullable();
            $table->date('date_installation')->nullable();
            $table->date('date_derniere_maintenance')->nullable();
            $table->string('entreprise_maintenance')->nullable();
           // $table->polygon('geom');
            // Add geometry column
        $table->geometry('geom', 'POLYGON', 4326)->nullable(false);
            $table->timestamps();
        });
        DB::statement('ALTER TABLE secteur ADD SPATIAL INDEX sidx_secteur_geom (geom)');
    }

    public function down():void
    {
        Schema::dropIfExists('secteur');
    }
};
