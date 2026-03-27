<?php

namespace App\Contracts;

interface SousProvedRepositoryInterface
{
    public function create(array $data);
    public function findById($id);
    public function getEcoles($sousProvedId);
}