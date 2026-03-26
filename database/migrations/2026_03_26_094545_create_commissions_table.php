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
        Schema::create('commissions', function (Blueprint $table) {

            $table->id();
            
            $table->foreignId('affectation_id')->constrained()->cascadeOnDelete();

            $table->string('numero');// ex: COM-2026-001
            $table->date('date_signature');

            $table->string('fichier')->nullable();//Chemin PDF
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commissions');
    }
};
