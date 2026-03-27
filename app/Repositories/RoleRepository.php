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

    public function getRoleByName($roleName)
    {
        $role = Role::where('nom', $roleName)->first(['id']);
        return $role;   //return $role ? $role->id : null;
    }

}