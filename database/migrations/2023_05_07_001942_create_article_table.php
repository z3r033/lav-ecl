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
        Schema::create('article', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->text('description')->nullable();
            $table->integer('quantite');
            $table->decimal('prix', 10, 2);
            $table->date('date_ajout');
            $table->timestamp('date_mise_a_jour')->useCurrent();
            $table->unsignedBigInteger('type_article_id');
            $table->foreign('type_article_id')->references('id')->on('type_article');
            $table->boolean('estDisponible')->default(1);
            $table->string('imageUrl')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('article');
    }
};
