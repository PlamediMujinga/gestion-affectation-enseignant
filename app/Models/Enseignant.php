<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enseignant extends Model
{
    /** @use HasFactory<\Database\Factories\EnseignantFactory> */
    use HasFactory;

    //Les champs qui peuvent etre rempli via create() ou update() [par un formulaire]
    protected $fillable = [
        'user_id',
        'matricule',
        'nom',
        'postnom',
        'prenom',
        'sexe',
        'email',
        'telephone',
        'adresse',
        'niveau_etude',
        'specialite',
        'date_recrutement',
        'province_id',
        'ecole_id'
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function ecoles()
    {
        return $this->belongsTo(Ecole::class);
    }

    public function affectations()
    {
        return $this->hasMany(Affectation::class);
    }

    public function demandes()
    {
        return $this->morphMany(Demande::class, 'emetteur');
    }

    public function provinces()
    {
        return $this->belongsTo(Province::class);
    }

}
