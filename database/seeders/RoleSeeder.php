<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Le premier remplissage de la table Role pour permetttre le fonctionnement de la plateforme
        $roles = [
            'enseignant',
            'ecole',
            'sous_proved',
            'proved',
            'ministere',
            'admin'
        ];

        foreach ($roles as $role) {
            Role::create([
                'nom' => $role
            ]);
        }
    }
}
