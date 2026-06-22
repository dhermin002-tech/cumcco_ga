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
        Schema::create('rendez_vous', function (Blueprint $table) {
        $table->id();
    // Infos patient
        $table->string('nom');
        $table->string('prenom');
        $table->string('email');
        $table->string('telephone');
    // Infos rendez-vous
        $table->string('type');  // ou enum
        $table->string('specialite');
        $table->string('medecin');
        $table->date('date');
        $table->string('creneau');
    // Optionnel
        $table->text('motif')->nullable();
        $table->timestamps();
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rendez_vous');
    }
};
