<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('chemin_fichier');
            $table->enum('etat_validation', ['en_attente', 'valide', 'refuse'])->default('en_attente');
            $table->timestamp('date_telechargement')->nullable();
            $table->timestamps();
            $table->unsignedBigInteger('utilisateur_id')->nullable();

        });
        
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};
