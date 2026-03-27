<?php

namespace App\Contracts;

interface UserRepositoryInterface
{
    public function create(array $data);
    public function findByEmail($email);
    public function assignRole($user,$roleId);
}