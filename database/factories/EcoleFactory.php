<?php

namespace Database\Factories;

use App\Models\SousProved;
use App\Models\Ecole;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ecole>
 */
class EcoleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        

        $nom = $this->faker->unique()->company . '  School';
        $emailName = Str::slug($nom, '.');

        //Génération numéro de phone
        $prefix = $this->faker->randomElement(['81', '82', '83', '84', '85', '89', '90', '97', '98', '99']);
        $phone = '+243' . $prefix . $this->faker->numerify('#######');

        return [
            //Pour injection des fausses ecoles dans la base de données
            'user_id' => null,

            'nom' => $nom,
            'code_ecole' => strtoupper($this->faker->unique()->bothify('ECO-######')),

            'type' => $this->faker->randomElement(['primaire','secondaire','complexe']),
            'adresse' => $this->faker->numberBetween(1,200) . ', Avenue ' . $this->faker->streetName .
             ', Quartier ' . $this->faker->word . ', Commune de ' . $this->faker->city,
            'telephone' => $phone,
            'email' => $emailName . "@edu.cd",

            'sous_proved_id' => \App\Models\SousProved::factory(),
            'directeur_id' => null,
            
            'poste_vacant' => $this->faker->numberBetween(0,5),
            'nombre_eleves' => $this->faker->numberBetween(70,400),
            
        ];
    }
}
