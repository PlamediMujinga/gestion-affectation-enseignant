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
        'province_id',
        'sous_proved_id',
        'capacite',
        'nombre_eleves',
        'directeur_id'
    ];

    public function users()
    {
        return $this->belongsTO(User::class);
    }

    public function enseignants()
    {
        return $this->hasMany(Enseignant::class);
    }

    public function directeur()
    {
        return $this->belongsTo(Enseignant::class);
    }

    public function sousProveds()
    {
        return $this->belongsTo(SousProved::class);
    }

    public function provinces()
    {
        return $this->belongsTo(Province::class);
    } 

    public function demandes()
    {
        return $this->morphMany(Demande::class, 'emetteur');
    }

    public function affectations()
    {
        return $this->hasMany(Affectation::class);
    }
}
