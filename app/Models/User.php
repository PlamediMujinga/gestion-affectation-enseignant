<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory;

    use Notifiable;

    protected $fillable = [
        'nom',
        'email',
        'password',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'user_role');
    }

    public function enseignant()
    {
        return $this->hasOne(Enseignant::class);
    }

    public function ecole()
    {
        return $this->hasOne(Ecole::class);
    }

    public function proved()
    {
        return $this->hasOne(Proved::class);
    }

    public function sousProved()
    {
        return $this->hasOne(SousProved::class);
    }

    public function demandesTraitee()
    {
        return $this->hasMany(Demande::class, 'traite_par');
    }

    public function affectionsCreee()
    {
        return $this->hasMany(Affectation::class, 'created_by');
    }

    public function hasPermission($permission)
    {
        foreach ($this->roles as $role) {
            if ($role->permission->contains('nom', $permission)) {
                return true;
            }
        }
        return false;
    }

    public function hasRole($role)
    {
        return $this->roles->contains('nom', $role);
    }

    // Vérifie si l'utilisateur a un des rôles donnés
    public function hasAnyRole(array $roles)
    {
        return $this->roles->whereIn('nom', $roles)->isNotEmpty();
    }
}
