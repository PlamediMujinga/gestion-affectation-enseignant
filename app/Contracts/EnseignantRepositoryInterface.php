<?php

namespace App\Contracts;

interface EnseignantRepositoryInterface
{
    public function create(array $data);
    public function findById($id);
    public function findByMatriculeAndEmail($matricule, $email);
    public function linkUser($enseignant, $userId);
    public function getAvailable();
}