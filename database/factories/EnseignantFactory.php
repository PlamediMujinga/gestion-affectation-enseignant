<?php

namespace Database\Factories;

use App\Models\Province;
use App\Models\Enseignant;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Enseignant>
 */
class EnseignantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $province = Province::inRandomOrder()->first();

        $nom = $this->faker->lastName;
        $postnom = $this->faker->lastName;
        $prenom = $this->faker->unique()->firstName;
        $name = $nom . '' . $prenom;
        $emailName = Str::slug($name, '.');

        //Génération numéro de phone
        $prefix = $this->faker->randomElement(['81', '82', '83', '84', '85', '89', '90', '97', '98', '99']);
        $phone = '+243' . $prefix . $this->faker->numerify('#######');

        return [
            //Pour injection des faux enseignants dans la base de données
            'user_id' => null,

            'matricule' => strtoupper($this->faker->unique()->bothify('ENS-#######')),

            'nom' => $nom,
            'postnom' => $postnom,
            'prenom' => $prenom,
            

            'sexe' => $this->faker->randomElement(['M','F']),
            'email' => $emailName . "@gmail.com",
            'telephone' => $phone,
            'adresse' => $this->faker->numberBetween(1,200) . ', Avenue ' . $this->faker->streetName .
             ', Quartier ' . $this->faker->word . ', Commune de ' . $this->faker->city,
            
            'niveau_etude' => $this->faker->randomElement(['Diplome_etat','Graduat','Licence']),
            'specialite' => $this->faker->randomElement(['Mathématiques','Français','Histoire','Civisme']),

            'province_id' => $province->id,
            'ecole_id' => null,
            
        ];
    }
}
