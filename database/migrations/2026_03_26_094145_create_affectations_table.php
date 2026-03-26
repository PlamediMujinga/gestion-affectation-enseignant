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
        Schema::create('affectations', function (Blueprint $table) {

            $table->id();
            
            $table->foreignId('enseignant_id')->constrained()->cascadeOnDelete();

            $table->foreignId('ecole_id')->constrained()->cascadeOnDelete();

            $table->date('date_affectation');

            $table->enum('type',[
                'affectation',
                'mutation'
            ]);

            $table->enum('statut',[
                'active',
                'terminee',
            ])->default('active');

            //Qui a fait l'affectation
             $table->foreignId('created_by')->nullable()->constrained('users')->cascadeOnDelete();
            //Lien avec la demande
            $table->foreignId('demande_id')->nullable()->constrained()->nullOnDelete();

            $table->text('commentaire')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('affectations');
    }
};
