<?php

namespace App\Services;

use App\Contracts\UserRepositoryInterface;
use App\Contracts\RoleRepositoryInterface;
use Illuminate\Support\Facades\Hash;

class UserService
{
    protected $userRepository;
    protected $roleRepository;

    public function __construct(UserRepositoryInterface $userRepository, RoleRepositoryInterface $roleRepository)
    {
        $this->userRepository = $userRepository;
        $this->roleRepository = $roleRepository;
    }

    //Créer école
    public function createUserWithRole($data,$roleName)
    {
        $user = $this->userRepository->create([
            'nom' => $data['nom'],
            'email' => $data['email'],
            'password' => Hash::make($data['nom'])
        ]);

        $roleId = $this->roleRepository->getRoleIdByName($roleName);

        $this->userRepository->assignRole($user, $roleId);

        return $user;
    }

    //Trouver un user par Email
    public function findByEmail($email)
    {
        return $this->userRepository->findByEmail($email);
    }

}