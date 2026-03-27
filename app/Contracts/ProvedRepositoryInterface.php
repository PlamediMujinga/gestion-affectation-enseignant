<?php

namespace App\Contracts;

interface ProvedRepositoryInterface
{
    public function create(array $data);
    public function findById($id);
    public function getSousProveds($provedId);
}