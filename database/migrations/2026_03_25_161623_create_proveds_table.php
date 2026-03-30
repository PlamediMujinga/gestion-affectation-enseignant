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
        Schema::create('proveds', function (Blueprint $table) {

            $table->id();
            //Proved comme autorité provinciale du minstere (pas une personne)

            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();

            //Nom - ex: Lukunga
            $table->string('nom');
            
            //Code - ex:005
            $table->string('code')->unique();

            $table->foreignId('province_id')->constrained()->cascadeOnDelete();

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
        Schema::dropIfExists('proveds');
    }
};
