<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Affectation extends Model
{
    /** @use HasFactory<\Database\Factories\AffectationFactory> */
    use HasFactory;

    protected $fillable = [
        'enseignant_id',
        'ecole_id',
        'date_affectation',
        'type',
        'commentaire'
    ];

    public function enseignants()
    {
        return $this->belongsTo(Enseignant::class);
    }

    public function ecoles()
    {
        return $this->belongsTo(Ecole::class);
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function demande()
    {
        return $this->belongsTo(Demande::class);
    }
}
