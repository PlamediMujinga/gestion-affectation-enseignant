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
        Schema::create('ecoles', function (Blueprint $table) {
            
            $table->id();
            
            //Peut-etre nul si ecole n'a pas encore de compte
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();

            $table->string('nom');

            $table->string('code_ecole')->unique();

            $table->enum('type', ['primaire', 'secondaire', 'complexe']);
            $table->enum('statut', ['publique', 'privée'])->default('publique');

            $table->string('adresse')->nullable();
            $table->string('telephone')->nullable();
            $table->string('email')->nullable();

            $table->foreignId('province_id')->constrained()->cascadeOnDelete();
            $table->foreignId('sous_proved_id')->constrained()->cascadeOnDelete();

            // $table->foreignId('directeur_id')->nullable()->constrained('enseignants')->nullOnDelete();

            $table->integer('capacite')->nullable();
            $table->integer('nombre_eleves')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ecoles');
    }
};
