<?php

namespace App\Services;

use App\Contracts\DemandeRepositoryInterface;

class DemandeService
{
    protected $demandeRepository;

    public function __construct(DemandeRepositoryInterface $demandeRepository)
    {
        $this->demandeRepository = $demandeRepository;
    }

    //Ecole fait une demande
    public function creerDemandeEcole($ecole, $data)
    {
        return $this->demandeRepository->create([
            'type_demande' => $data['type_demande'],
            'emetteur_type' => 'ecole',
            'emetteur_id' => $ecole->id,
            'specialite_requise' => $data['specialite'] ?? null,
            'nombre_enseignants' => $data['nombre'] ?? null,
            'description' => $data['description'] ?? null,
            'statut' => 'en_attente'
        ]);
    }

    //Enseignant fait une demande
    public function creerDemandeEnseignant($enseignant, $data)
    {
        return $this->demandeRepository->create([
            'type_demande' => $data['type_demande'],
            'emetteur_type' => 'enseignant',
            'emetteur_id' => $enseignant->id,
            'description' => $data['description'] ?? null,
            'statut' => 'en_attente'
        ]);
    }

    //Récupérer demandes en attente
    public function getDemandesEnAttente()
    {
        return $this->demandeRepository->getPending();
    }

    //Traiter demande
    public function traiterDemande($id, $status)
    {
        return $this->demandeRepository->updateStatus($id, $status);
    }
}