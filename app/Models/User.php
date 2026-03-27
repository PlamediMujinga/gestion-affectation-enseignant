<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory;

    protected $fillable = [
        'nom',
        'email',
        'password',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'user_role');
    }

    public function enseignants()
    {
        return $this->hasOne(Enseignant::class);
    }

    public function ecoles()
    {
        return $this->hasOne(Ecole::class);
    }

    public function proveds()
    {
        return $this->hasOne(Proved::class);
    }

    public function sousProveds()
    {
        return $this->hasOne(SousProved::class);
    }

    public function demandesTraitees()
    {
        return $this->hasMany(Demande::class, 'traite_par');
    }

    public function affectionsCreees()
    {
        return $this->hasMany(Affectation::class, 'created_by');
    }

    public function hasPermission($permissionName)
    {
        foreach ($this->roles as $role) {
            if ($role->permission->contains('nom', $permissionName)) {
                return true;
            }
        }
        return false;
    }
}
