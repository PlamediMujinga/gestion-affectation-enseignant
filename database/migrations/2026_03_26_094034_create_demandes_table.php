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
        Schema::create('demandes', function (Blueprint $table) {

            $table->id();
            
            $table->enum('type_demande',[
                'manque_enseignant',
                'surplus_enseignant',
                'demande_transfert',
                'demande_affectation'
            ]);

            //Qui fait la demande (polymorphique)
            $table->string('emetteur_type'); //ecole ou enseignant
            $table->unsignedBigInteger('emetteur_Id');

            $table->text('description')->nullable();

            //Cas Ecole
            $table->string('specialite_requise')->nullable();
            $table->integer('nombre_enseignants')->nullable();

            $table->enum('statut',[
                'en_attente',
                'validee',
                'rejetee'
            ])->default('en_attente');

            $table->timestamp('date_demande')->useCurrent();

            //Qui traite la demande (proved ou sous proved)
            $table->foreignId('traite_par')->nullable()->constrained('users')->nullOnDelete();

            $table->text('commentaire_reponse')->nullable();
            
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('demandes');
    }
};
