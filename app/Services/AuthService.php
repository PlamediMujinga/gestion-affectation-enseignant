<?php

namespace App\Services;

use App\Contracts\UserRepositoryInterface;
use App\Contracts\EnseignantRepositoryInterface;
use App\Contracts\EcoleRepositoryInterface;
use App\Contracts\RoleRepositoryInterface;
use App\Services\AuditService;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Exception;

class AuthService
{
    protected $userRepository;
    protected $enseignantRepository;
    protected $ecoleRepository;
    protected $roleRepository;
    protected $auditService;

    public function __construct(UserRepositoryInterface $userRepository, EnseignantRepositoryInterface $enseignantRepository,
                                EcoleRepositoryInterface $ecoleRepository, RoleRepositoryInterface $roleRepository, AuditService $auditService)
    {
        $this->userRepository = $userRepository;
        $this->enseignantRepository = $enseignantRepository;
        $this->ecoleRepository = $ecoleRepository;
        $this->roleRepository = $roleRepository;
        $this->auditService = $auditService;
    }

    //Enregistrement
    public function register(array $data)
    {
        return DB::transaction(function () use($data){
            if($this->userRepository->findByEmail($data['email']))
            {
                DB::rollBack();
                $this->auditService->log(
                    'register_failed',
                    'Email déjà utilisé: ' . $data['email']
                );

                throw new Exception("Email déjà utilisé");
            }

            //Si c'est un Enseignant
            if($data['type'] === 'enseignant') 
            {
                $enseignant = $this->enseignantRepository->findByMatriculeAndEmail($data['matricule'], $data['email']);
                if(!$enseignant)
                {
                    DB::rollBack();
                    $this->auditService->log(
                        'fraud_attempt',
                        'Faux matricule enseignant: ' . $data['matricule']
                    );

                    throw new Exception("Enseignant introuvable");
                }
                if ($enseignant->user_id)
                {
                    throw new Exception("Compte déjà existant");            
                }

                $user = $this->userRepository->create([
                    'nom' => $data['nom'],
                    'email' => $data['email'],
                    'password' => Hash::make($data['password'])
                ]);

                $this->enseignantRepository->linkUser($enseignant, $user->id);
                $roleId = $this->roleRepository->getRoleIdByName('enseignant');
                $this->userRepository->assignRole($user, $roleId);

                $this->auditService->log(
                    'register_success',
                    'Inscription enseignant réussie',
                    $user->id
                );
                return $user;
            }

            //Si c'est une Ecole
            if($data['type'] === 'ecole') 
            {
                $ecole = $this->ecoleRepository->findByCodeAndEmail($data['matricule'], $data['email']);
                if(!$ecole)
                {
                    DB::rollBack();
                    $this->auditService->log(
                    'fraud_attempt',
                    'Faux code ecole: '
                    );

                    throw new Exception("Ecole introuvable");
                }
                if ($ecole->user_id)
                {
                    throw new Exception("Compte déjà existant");            
                }
                
                $user = $this->userRepository->create([
                    'email' => $data['email'],
                    'password' => Hash::make($data['password'])
                ]);

                $this->ecoleRepository->linkUser($ecole, $user->id);
                $roleId = $this->roleRepository->getRoleIdByName('ecole');
                $this->userRepository->assignRole($user, $roleId);

                
                $this->auditService->log(
                    'register_success',
                    'Inscription ecole réussie',
                    $user->id
                );

                return $user;
            }
            throw new Exception("Type invalide");
        });
    }

    //Connexion
    public function login(array $credentials)
    {
        if(!Auth::attempt($credentials)){
            $this->auditService->log(
                    'login_failed',
                    'Identifiants incorrects'
                );
            throw new Exception("Identifiants incorrects");
        }

        return Auth::user();
    }
}

