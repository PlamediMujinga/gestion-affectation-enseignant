<?php

namespace App\Contracts;

interface EcoleRepositoryInterface
{
    public function create(array $data);
    public function findById($id);
    public function findByCodeAndEmail($code, $email);
    public function linkUser($ecole, $userId);
    public function getAll();
}