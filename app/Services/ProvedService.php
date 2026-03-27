<?php

namespace App\Services;

use App\Contracts\ProvedRepositoryInterface;
use App\Contracts\SousProvedRepositoryInterface;
use App\Contracts\AffectationRepositoryInterface;
use App\Contracts\DemandeRepositoryInterface;

class ProvedService
{
    protected $provedRepository;
    protected $sousProvedRepository;
    protected $affectationRepository;
    protected $demandeRepository;

    public function __construct(ProvedRepositoryInterface $provedRepository, 
                                SousProvedRepositoryInterface $sousProvedRepository,
                                AffectationRepositoryInterface $affectationRepository, 
                                DemandeRepositoryInterface $demandeRepository)
    {
        $this->sousProvedRepository = $sousProvedRepository;
        $this->provedRepository = $provedRepository;
        $this->affectationRepository = $affectationRepository;
        $this->demandeRepository = $demandeRepository;
    }

    //Créer Proved
    public function store($data)
    {
        return $this->provedRepository->create($data);
    }

    //Prendre tous les SousProved
    public function getSousProveds($provedId)
    {
        return $this->provedRepository->getSousProveds($provedId);
    }

    //Pour Dashboard
    public function dashboard($provedId)
    {
        return [
            'sous_proveds' => $this->getSousProveds($provedId),
            'demandes' => $this->demandeRepository->getPending(),
            'affectations' => $this->affectationRepository->getAll()
        ];
    }
}