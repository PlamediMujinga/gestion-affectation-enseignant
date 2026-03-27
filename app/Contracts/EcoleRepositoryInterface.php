<?php

namespace App\Contracts;

interface EcoleRepositoryInterface
{
    public function create(array $data);
    public function findById($id);
    public function getAll();
}