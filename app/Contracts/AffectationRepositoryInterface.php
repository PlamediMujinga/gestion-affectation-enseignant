<?php

namespace App\Contracts;

interface AffectationRepositoryInterface
{
    public function create(array $data);
    public function getAll();
    public function getByEnseignant($enseignantId);
    public function getByEcole($ecoleId);
}