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
    Schema::create('ressources', function (Blueprint $table) {
        $table->id();
        $table->string('nom');
        $table->string('type');
        $table->text('description')->nullable();
        $table->timestamps();
        $table->foreignId('utilisateur_id')->constrained('utilisateurs')->onDelete('cascade');
    });
    
}

    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ressources');
    }
};
