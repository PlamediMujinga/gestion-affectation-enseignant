<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Province;
use App\Models\Proved;
use App\Models\SousProved;
use App\Models\Ecole;
use App\Models\Enseignant;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        /***
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        */

        //Roles et Permissions et admin
        $this->call([
            RoleSeeder::class,
            PermissionSeeder::class,
            RolePermissionSeeder::class,
            AdminSeeder::class
        ]);

        //Provinces, Proveds, SousProveds et Ecoles
        $provincesRDC = [
            'Bas-Uele', 'Equateur', 'Haut-Katanga', 'Haut-Lomami', 'Haut-Uele',
            'Ituri', 'Kasai', 'Kasai-Central', 'Kasai Oriental', 'Kinshasa',
            'Kongo Central', 'Kwango', 'Kwilu', 'Lomami', 'Lualaba',
            'Mai-Ndombe', 'Maniema', 'Mongala', 'Nord-Kivu', 'Nord-Ubangi',
            'Sankuru', 'Sud-Kivu', 'Sud-Ubangi', 'Tanganyika', 'Tshopo', 'Tshuapa'
        ];
        
        foreach ($provincesRDC as $nom) {
            //Création Province
            $province = Province::create(['nom' => $nom]);

            //Création Proved
            $proveds = Proved::factory(2)->create([
                'province_id' => $province->id
            ]);

            foreach ($proveds as $proved) {
                //Création User pour Proved
                $userProved = User::factory()->create([
                    'nom' => $proved->nom,
                    'email' => strtolower(str_replace(' ', '', $proved->nom)) . "@edu.cd",
                ]);

                $userProved->roles()->attach(Role::where('nom', 'proved')->first());
                $proved->update(['user_id' => $userProved->id]);

                //Création Sous Proved
                $sousProveds = SousProved::factory(2)->create([
                    'proved_id' => $proved->id
                ]);

                foreach ($sousProveds as $sousProved) {
                    //Création User pour Proved
                    $userSProved = User::factory()->create([
                        'nom' => $sousProved->nom,
                        'email' => strtolower(str_replace(' ', '', $sousProved->nom)) . "@edu.cd",
                    ]);

                    $userSProved->roles()->attach(Role::where('nom', 'proved')->first());
                    $sousProved->update(['user_id' => $userSProved->id]);
                    
                    //Création ecole
                    $ecoles = Ecole::factory(3)->create([
                        'sous_proved_id' => $sousProved->id
                    ]);

                    foreach ($ecoles as $ecole) {
                        //Création enseignant avec ecole
                        Enseignant::factory(3)->create([
                            'statut' => 'actif',
                            'ecole_id' => $ecole->id,
                        ]);
                    }
                }
            }
        }

        \App\Models\Enseignant::factory(50)->create(['statut' => 'en_attente']);
        
        \App\Models\Demande::factory(50)->create();
        // \App\Models\Affectation::factory(10)->create();
    }
}
