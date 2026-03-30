<?php

namespace Database\Factories;

use App\Models\Demande;
use App\Models\Ecole;
use App\Models\Enseignant;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Demande>
 */
class DemandeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $estEcole = $this->faker->boolean();
        $emetteur = $estEcole
            ? Ecole::inRandomOrder()->first()
            : Enseignant::inRandomOrder()->first();
        

        return [
            //Pour injection des fausses demandes dans la base de données

            'type_demande' => $estEcole ? $this->faker->randomElement(['manque_enseignant', 'surplus_enseignant']) 
                                        : $this->faker->randomElement(['demande_affectation', 'demande_transfert']),

            'emetteur_type' => $estEcole ? 'ecole' : 'enseignant',
            'emetteur_id' => $emetteur->id,

            'description' => $this->faker->sentence(),
            
            'specialite_requise' => $estEcole ? $this->faker->randomElement(['Mathématiques','Français','Histoire']) 
                                            : null,
            'nombre_enseignants' => $estEcole ? $this->faker->numberBetween(1,5) : null,
               
        ];
    }
}
