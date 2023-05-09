<?php
use Illuminate\Support\Facades\DB;
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
        Schema::create('reclamation', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('utilisateur_id');
            $table->foreign('utilisateur_id')->references('id')->on('users');
            $table->unsignedBigInteger('equipe_id');
            $table->foreign('equipe_id')->references('id')->on('equipe');
            $table->unsignedBigInteger('secteur_id')->nullable();
            $table->foreign('secteur_id')->references('id')->on('secteur')->onDelete('cascade');
            $table->string('titre', 255)->nullable(false);
            $table->text('description')->nullable(false);
            $table->timestamp('date_creation')->useCurrent();
            $table->timestamp('date_modification')->useCurrent()->nullable(false)->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->enum('statut', ['ouverte', 'en_cours', 'resolue', 'fermee'])->nullable(false);
            $table->string('source_defaillance', 255)->nullable();
            $table->string('etat_signalement', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reclamation');
    }
};
