<?php

namespace App\Services;

use App\Contracts\SousProvedRepositoryInterface;
use App\Contracts\EcoleRepositoryInterface;
use App\Contracts\DemandeRepositoryInterface;

class SousProvedService
{
    protected $sousProvedRepository;
    protected $ecoleRepository;
    protected $demandeRepository;

    public function __construct(SousProvedRepositoryInterface $sousProvedRepository, 
                                EcoleRepositoryInterface $ecoleRepository, 
                                DemandeRepositoryInterface $demandeRepository)
    {
        $this->sousProvedRepository = $sousProvedRepository;
        $this->ecoleRepository = $ecoleRepository;
        $this->demandeRepository = $demandeRepository;
    }

    //Créer école
    public function store($data)
    {
        return $this->sousProvedRepository->create($data);
    }

    //Prendre toutes les écoles
    public function getEcoles($sousProvedId)
    {
        return $this->sousProvedRepository->getEcoles($sousProvedId);
    }

    //Prendre toutes les demandes
    public function getDemandes($sousProvedId)
    {
        return $this->demandeRepository->getBySousProved($sousProvedId);
    }

    //Pour Dashboard
    public function dashboard($sousProvedId)
    {
        return [
            'ecoles' => $this->getEcoles($sousProvedId),
            'demandes' => $this->getDemandes($sousProvedId)
        ];
    }
}