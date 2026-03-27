<?php

namespace App\Repositories;

use App\Models\Enseignant;
use App\Contracts\EnseignantRepositoryInterface;

class EnseignantRepository implements EnseignantRepositoryInterface
{
    public function create(array $data)
    {
        return Enseignant::create($data);
    }

    public function findById($id)
    {
        return Enseignant::findOrFail($id);
    }

    public function getAvailable()
    {
        return Enseignant::whereNull('ecole_id')->get();
    }
}