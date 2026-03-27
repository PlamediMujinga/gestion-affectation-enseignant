<?php

namespace App\Repositories;

use App\Models\Demande;
use App\Contracts\DemandeRepositoryInterface;

class DemandeRepository implements DemandeRepositoryInterface
{
    public function create(array $data)
    {
        return Demande::create($data);
    }

    public function findById($id)
    {
        return Demande::findOrFail($id);
    }

    public function getPending()
    {
        return Demande::where('statut', 'en_attente')->get();
    }

    public function updateStatus($id, $status)
    {
        $demande = $this->findById($id);
        $demande->update(['statut' => $status]);
        return $demande;
    }
}