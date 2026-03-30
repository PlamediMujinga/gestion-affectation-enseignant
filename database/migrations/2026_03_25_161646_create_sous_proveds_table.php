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
        Schema::create('sous_proveds', function (Blueprint $table) {

            $table->id();
            //Sous Proved comme autorité divisionnaire du minstere sous l'autorité du proved (pas une personne)

            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();

            //Nom - ex: 
            $table->string('nom');

            $table->string('code')->unique();

            $table->foreignId('proved_id')->constrained()->cascadeOnDelete();

            $table->string('adresse')->nullable();
            $table->string('telephone')->nullable();
            $table->string('email')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sous_proveds');
    }
};
