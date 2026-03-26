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
        Schema::create('enseignants', function (Blueprint $table) {
            
            $table->id();

            //User_id peut etre nul si l'enseignant n'a pas encore de compte
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();

            $table->string('matricule')->unique();

            $table->string('nom');
            $table->string('postnom');
            $table->string('prenom');

            $table->enum('sexe', ['M', 'F']);
            $table->date('date_naissance')->nullable();

            //Mail doit etre unique à l'enseignant
            $table->string('email')->nullable();

            $table->string('telephone')->nullable();
            $table->string('adresse')->nullable();

            $table->string('niveau_etude')->nullable();
            $table->string('specialite')->nullable();
            $table->string('grade')->nullable();

            $table->enum('statut', ['actif', 'en_attente', 'suspendu'])->default('en_attente');

            $table->date('date_recrutement')->nullable();

            $table->foreignId('province_id')->constrained()->cascadeOnDelete();
            $table->foreignId('sous_proved_id')->nullable()->constrained()->nullOnDelete();

            $table->foreignId('ecole_id')->nullable()->constrained()->nullOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enseignants');
    }
};
