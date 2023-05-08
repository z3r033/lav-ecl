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
        Schema::create('date_ordre_intervention', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ordre_intervention_id');
            $table->foreign('ordre_intervention_id')->references('id')->on('ordre_intervention')->onDelete('cascade');
            $table->date('date_debut');
            $table->date('date_fin');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('date_ordre_intervention');
    }
};
