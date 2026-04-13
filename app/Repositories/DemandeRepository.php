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

    public function getById($id, $type)
    {
        return Demande::where('emetteur_id', $id)
                        ->where('emetteur_type', $type)
                        ->orderBy('created_at', 'desc')
                        ->get();
    }

    public function getCount($id, $type)
    {
        return Demande::where('emetteur_id', $id)
                        ->where('emetteur_type', $type)
                        ->count();
    }

    public function getLast($id, $type, $nb)
    {
        return Demande::where('emetteur_id', $id)
                        ->where('emetteur_type', $type)
                        ->take($nb)
                        ->get();
    }
}