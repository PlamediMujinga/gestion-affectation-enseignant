<?php

namespace App\Services;

use App\Contracts\EnseignantRepositoryInterface;

class EnseignantService
{
    protected $enseignantRepository;

    public function __construct(EnseignantRepositoryInterface $enseignantRepository)
    {
        $this->enseignantRepository = $enseignantRepository;
    }

    //Créer un enseignant
    public function creerEnseignant($data)
    {
        return $this->enseignantRepository->create($data);
    }

    //Voir si un enseignant est non affecté
    public function getDisponible()
    {
        return $this->enseignantRepository->getAvailable();
    }

}