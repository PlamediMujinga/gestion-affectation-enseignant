<?php

namespace App\Repositories;

use App\Models\AuditLog;
use App\Contracts\AuditRepositoryInterface;

class AuditRepository implements AuditRepositoryInterface
{
    public function create(array $data)
    {
        return AuditLog::create($data);
    }
}