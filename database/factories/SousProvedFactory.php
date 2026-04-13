<?php

namespace Database\Factories;

use App\Models\SousProved;
use App\Models\Proved;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SousProved>
 */
class SousProvedFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $proved = Proved::inRandomOrder()->first();

        $nom = $this->faker->unique()->word;
        $emailName = Str::slug($nom, '.');

        //Génération numéro de phone
        $prefix = $this->faker->randomElement(['81', '82', '83', '84', '85', '89', '90', '97', '98', '99']);
        $phone = '+243' . $prefix . $this->faker->numerify('#######');

        return [
            //Pour injection des fausses proveds dans la base de données
            'user_id' => null,
            
            'nom' => 'Division ' . $nom,
            'code' => strtoupper($this->faker->unique()->bothify('DIV-####')),

            'proved_id' => \App\Models\Proved::factory(),

            'telephone' => $phone,
            'email' => "division" . $emailName . "@edu.cd",
        ];
    }
}
