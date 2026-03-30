<?php

namespace App\Contracts;

interface AuditRepositoryInterface
{
    public function create(array $data);
}