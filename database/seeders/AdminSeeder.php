<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;


class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Creation de l'administrateur
        $admin = User::create([
            'nom' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admind123')
        ]);

        $role = Role::where('nom', 'admin')->first();

        $admin->roles()->attach($role);
    }
}
