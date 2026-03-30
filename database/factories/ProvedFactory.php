<?php

namespace Database\Factories;

use App\Models\Province;
use App\Models\Proved;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Proved>
 */
class ProvedFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $province = Province::inRandomOrder()->first();

        $nom = $this->faker->unique()->city . ' ' . $this->faker->randomElement(['Nord', 'Sud', 'Est', 'Ouest', 'Centre']);
        $emailName = Str::slug($nom, '.');
        //Génération numéro de phone
        $prefix = $this->faker->randomElement(['81', '82', '83', '84', '85', '89', '90', '97', '98', '99']);
        $phone = '+243' . $prefix . $this->faker->numerify('#######');

        return [
            //Pour injection des fausses proveds dans la base de données
            'user_id' => null,

            'nom' => 'Proved ' . $nom,
            'code' => strtoupper($this->faker->unique()->bothify('PROV-####')),

            'province_id' => $province->id,

            'telephone' => $phone,
            'email' => "proved" . $emailName . "@edu.cd",
        ];
    }
}
