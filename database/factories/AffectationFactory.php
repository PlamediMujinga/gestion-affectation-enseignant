<?php

namespace Database\Factories;

use App\Models\Ecole;
use App\Models\Enseignant;
use App\Models\User;
use App\Models\Demande;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Affectation>
 */
class AffectationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        //Récuperation 
        $enseignant = Enseignant::inRandomOrder()->first();
        $ecole = Ecole::inRandomOrder()->first();
        $demande = Demande::inRandomOrder()->first();
        
        //
        $agent = User::whereHas('roles', function($q) {
            $q->where('nom', 'sous_proved');
            })
            ->where('sous_proved_id', $ecole->sous_proved_id)
            ->first();

        $validate = $this->faker->boolean();
        $dem = $validate 
                    ? $demande->update(['statut' => 'validee', 'traite_par' => $agent->id])
                    : null;

        return [
            //Pour injection des fausses demandes dans la base de données
            'enseignant_id' => $enseignant->id,
            'ecole_id' => $ecole->id,

            'type' => $this->faker->randomElement(['Affectation', 'Mutation']),

            'date_affectation' => $this->faker->dateTime('now'),
            
            'created_by' => $agent->id,

            'demande_id' => $validate ? $demande->id : null,
            
            'commentaire' => 'Affectation validée par le bureau de la sous division.',
        ];
    }
}
