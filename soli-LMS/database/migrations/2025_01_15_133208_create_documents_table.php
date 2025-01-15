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
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->string('chemin_fichier');
            $table->string('validation')->nullable(); // For Formateur validation
            $table->timestamp('date_telechargement')->nullable();
            $table->string('etat_validation')->nullable();
            $table->timestamps();
            $table->foreignId('categorie_id')->constrained()->onDelete('cascade');
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
