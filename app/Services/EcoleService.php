<?php

namespace App\Services;

use App\Contracts\EcoleRepositoryInterface;

class EcoleService
{
    protected $ecoleRepository;

    public function __construct(EcoleRepositoryInterface $ecoleRepository)
    {
        $this->ecoleRepository = $ecoleRepository;
    }

    //Créer école
    public function creerEcole($data)
    {
        return $this->ecoleRepository->create($data);
    }

    //Prendre toutes les écoles
    public function getAll()
    {
        return $this->ecoleRepository->getAll();
    }

    //Trouver une école par ID
    public function findById($id)
    {
        return $this->ecoleRepository->findById($id);
    }

}