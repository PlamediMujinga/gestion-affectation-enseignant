<?php

namespace App\Repositories;

use App\Models\Role;
use App\Contracts\RoleRepositoryInterface;

class RoleRepository implements RoleRepositoryInterface
{
    public function create(array $data)
    {
        return Role::create($data);
    }

    public function getRoleIdByName($roleName)
    {
        return Role::where('nom', $roleName)->value('id');
    }

}