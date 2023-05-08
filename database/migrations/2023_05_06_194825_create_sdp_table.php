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
        Schema::create('sdp', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('led_id');
            $table->foreign('led_id')->references('id')->on('led');
            $table->date('date_adoption');
            $table->string('ville', 255);
            $table->text('objectifs');
            $table->text('strategies');
            $table->text('actions');
            $table->integer('couts');
            $table->text('echeanciers');
            $table->string('responsable', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sdp');
    }
};
