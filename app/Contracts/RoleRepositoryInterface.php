<?php

namespace App\Contracts;

interface RoleRepositoryInterface
{
    public function create(array $data);
    public function getRoleIdByName($roleName);
}