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
        Schema::table('ecoles', function (Blueprint $table) {
            //Ajout de la Colonne directeur dans la table ecoles
            $table->foreignId('directeur_id')->nullable()->constrained('enseignants')->nullOnDelete()->after('sous_proved_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ecoles', function (Blueprint $table) {
            //Revenir en arriere de cette action d'ajout
            $table->dropColumn('directeur_id');
        });
    }
};
