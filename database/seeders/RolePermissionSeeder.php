<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Remplissage des permissions pour chaque role
        $allRoles = Role::all()->keyBy('nom');
        $allPermissions = Permission::all()->keyBy('nom');

        //Enseignant
        $allRoles['enseignant'] -> permissions()->attach([
            $allPermissions['create_demande']->id,
            $allPermissions['view_demande']->id,
            $allPermissions['view_affectation']->id
        ]);


        //Ecole
        $allRoles['ecole'] -> permissions()->attach([
            $allPermissions['create_demande']->id,
            $allPermissions['view_demande']->id,
            $allPermissions['view_affectation']->id,
            $allPermissions['manage_enseignants']->id
        ]);

        //Sous-Proved
        $allRoles['sous_proved'] -> permissions()->attach([
            $allPermissions['view_demande']->id,
            $allPermissions['validate_demande']->id,
            $allPermissions['reject_demande']->id,
            $allPermissions['create_affectation']->id,
            $allPermissions['manage_enseignants']->id,
            $allPermissions['manage_ecoles']->id,
            $allPermissions['view_statistiques']->id
        ]);

        //Proved
        $allRoles['proved'] -> permissions()->attach([
            $allPermissions['view_demande']->id,
            $allPermissions['validate_demande']->id,
            $allPermissions['reject_demande']->id,
            $allPermissions['create_affectation']->id,
            $allPermissions['create_enseignant']->id,
            $allPermissions['manage_enseignants']->id,
            $allPermissions['create_ecole']->id,
            $allPermissions['manage_ecoles']->id,
            $allPermissions['create_sous_proved']->id,
            $allPermissions['manage_sous_proveds']->id,
            $allPermissions['view_statistiques']->id
        ]);

        //Ministère
        $allRoles['ministere']->permissions()->sync(
            $allPermissions->pluck('id')->toArray()
        );

        //Admin 
        $allRoles['admin']->permissions()->sync(
            $allPermissions->pluck('id')->toArray()
        );
    }
}
