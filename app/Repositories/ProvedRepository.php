<?php

namespace App\Repositories;

use App\Models\Proved;
use App\Contracts\ProvedRepositoryInterface;

class ProvedRepository implements ProvedRepositoryInterface
{
    public function create(array $data)
    {
        return Proved::create($data);
    }

    public function findById($id)
    {
        return Proved::findOrFail($id);
    }

    public function getSousProveds($provedId)
    {
        return Proved::findOrFail($provedId)->sousProved;
    }
}