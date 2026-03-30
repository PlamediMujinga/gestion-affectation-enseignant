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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ecole()
    {
        return $this->belongsTo(Ecole::class);
    }

    public function affectation()
    {
        return $this->hasMany(Affectation::class);
    }

    public function demande()
    {
        return $this->morphMany(Demande::class, 'emetteur');
    }

    public function province()
    {
        return $this->belongsTo(Province::class);
    }

}
