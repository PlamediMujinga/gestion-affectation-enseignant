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
        return Affectation::latest()->get();
    }

    public function getByEnseignant($enseignantId)
    {
        return Affectation::where('enseignant_id', $enseignantId)->get();
    }
}