<?php

namespace App\Services;

use App\Models\Demande;
use App\Models\Affectation;
use App\Models\Enseignant;
use App\Models\Ecole;

class StatistiqueService
{
    protected $enseignantRepository;

    //Créer un enseignant
    public function global()
    {
        return [
            'total_demandes' => Demande::count(),
            'total_affectation' => Affectation::count(),
            'ecoles' => Ecole::count(),
            'enseignants' => Enseignant::count(),
            'enseignants_disponibles' => Enseignant::whereNull('ecole_id')->count()
        ];
    }

}