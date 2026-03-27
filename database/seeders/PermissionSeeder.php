<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Remplissage de la table pour le fonctionnement de la plateforme
        $permissions = [
            'create_demande',
            'view_demande',
            'validate_demande',
            'reject_demande',
            'create_affectation',
            'view_affectation',
            'create_ecole',
            'manage_ecoles',
            'create_enseignant',
            'manage_enseignants',
            'create_sous_proved',
            'manage_sous_proveds',
            'view_statistiques',
            'view_rapports'
        ];

        foreach ($permissions as $permission) {
            Permission::create([
                'nom' => $permission
            ]);
        }
    }
}
