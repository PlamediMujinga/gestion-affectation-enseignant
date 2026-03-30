<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ecole extends Model
{
    /** @use HasFactory<\Database\Factories\EcoleFactory> */
    use HasFactory;

    //Les champs qui peuvent etre rempli via create() ou update()
    protected $fillable = [
        'user_id',
        'nom',
        'code_ecole',
        'type',
        'adresse',
        'telephone',
        'email',
        'sous_proved_id',
        'capacite',
        'nombre_eleves',
        'directeur_id'
    ];

    public function user()
    {
        return $this->belongsTO(User::class);
    }

    public function enseignant()
    {
        return $this->hasMany(Enseignant::class);
    }

    public function directeur()
    {
        return $this->belongsTo(Enseignant::class);
    }

    public function sousProved()
    {
        return $this->belongsTo(SousProved::class);
    } 

    public function demande()
    {
        return $this->morphMany(Demande::class, 'emetteur');
    }

    public function affectation()
    {
        return $this->hasMany(Affectation::class);
    }
}
