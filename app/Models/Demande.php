<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demande extends Model
{
    /** @use HasFactory<\Database\Factories\DemandeFactory> */
    use HasFactory;

    protected $fillable = [
        'type_demande',
        'emetteur_type',
        'emetteur_id',
        'description',
        'specialite_requise',
        'nombre_enseignants',
        'traite_par',
        'commentaire_reponse',
        'statut'
    ];

    public function emetteur()
    {
        return $this->morphTo();
    }

    public function traitePar()
    {
        return $this->belongsTo(User::class, 'traite_par');
    }

    public function affectation()
    {
        return $this->hasOne(Affectation::class);
    }
}
