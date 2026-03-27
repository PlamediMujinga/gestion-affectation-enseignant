<?php

namespace App\Repositories;

use App\Models\SousProved;
use App\Contracts\SousProvedRepositoryInterface;

class SousProvedRepository implements SousProvedRepositoryInterface
{
    public function create(array $data)
    {
        return SousProved::create($data);
    }

    public function findById($id)
    {
        return SousProved::findOrFail($id);
    }

    public function getEcoles($sousProvedId)
    {
        return SousProved::findOrFail($sousProvedId)->ecoles;
    }
}