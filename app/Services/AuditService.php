<?php

namespace App\Services;

use App\Contracts\AuditRepositoryInterface;

class AuditService
{
    protected $auditRepository;

    public function __construct(AuditRepositoryInterface $auditRepository)
    {
        $this->auditRepository = $auditRepository;
    }

    //Créer Log
    public function log($action, $description = null)
    {
        $this->auditRepository->create([
            'user_id' => null,
            'action' => $action,
            'description' => $description,
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
        ]);
    }
}