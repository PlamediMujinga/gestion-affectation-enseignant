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

    public function findByCodeAndEmail($code, $email)
    {
        return Ecole::where('code_ecole', $code)
                    ->where('email', $email)
                    ->first();
    }

    public function linkUser($ecole, $user_id)
    {
        $ecole->update(['user_id' => $user_id]);
    }

    public function getAll()
    {
        return Ecole::all();
    }
}