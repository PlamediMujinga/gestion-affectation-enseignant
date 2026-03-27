<?php

namespace App\Repositories;

use App\Models\Ecole;
use App\Contracts\EcoleRepositoryInterface;

class EcoleRepository implements EcoleRepositoryInterface
{
    public function create(array $data)
    {
        return Ecole::create($data);
    }

    public function findById($id)
    {
        return Ecole::findOrFail($id);
    }

    public function getAll()
    {
        return Ecole::all();
    }
}