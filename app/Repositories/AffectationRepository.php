<?php

namespace App\Repositories;

use App\Models\Affectation;
use App\Contracts\AffectationRepositoryInterface;

class AffectationRepository implements AffectationRepositoryInterface
{
    public function create(array $data)
    {
        return Affectation::create($data);
    }

    public function getAll()
    {
        return Affectation::with(['enseignant','ecole'])->get();
    }

    public function getByEnseignant($enseignantId)
    {
        return Affectation::where('enseignant_id', $enseignantId)->get();
    }

    public function getByEcole($ecoleId)
    {
        return Affectation::where('ecole_id', $ecoleId)->get();
    }
}