<?php

namespace App\Services;

use App\Contracts\AffectationRepositoryInterface;
use App\Contracts\DemandeRepositoryInterface;
use App\Contracts\EnseignantRepositoryInterface;

class AffectationService
{
    protected $affectationRepository;
    protected $demandeRepository;
    protected $enseignantRepository;

    public function __construct(AffectationRepositoryInterface $affectationRepository, 
                                DemandeRepositoryInterface $demandeRepository, 
                                EnseignantRepositoryInterface $enseignantRepository)
    {
        $this->affectationRepository = $affectationRepository;
        $this->demandeRepository = $demandeRepository;
        $this->enseignantRepository = $enseignantRepository;
    }

    //Affecter un enseignant
    public function affecterEnseignant($data, $userId)
    {
        //Verifier enseignant disponible
        $enseignant = $this->enseignantRepository->findById($data['enseignant_id']);

        if ($enseignant->ecole_id !== null){
            throw new \Exception("Enseignant déjà affecté");
        }

        //Créer affectation
        $affectation = $this->affectationRepository->create([
            'enseignant_id' => $data['enseignant_id'],
            'ecole_id' => $data['ecole_id'],
            'type' => $data['type'],
            'date_affectation' => now(),
            'created_by' => $userId,
            'demande_id' => $data['demande_id'] ?? null
        ]);

        //Mettre à jour enseignant
        $enseignant->update(['ecole_id' => $data['ecole_id']]);

        //Marquer demande traitée
        if(isset($data['demande_id'])){
            $this->demandeRepository->updateStatus($data['demande_id'], 'traitee');
        }

        return $affectation;
    }

    public function getById($id, $type)
    {
        if($type == 'enseignant'){
            return $this->affectationRepository->getByEnseignant($id);
        }
        else{
            return $this->affectationRepository->getByEcole($id);
        }   
    }
    
    //Prendre toutes les affectations
    public function getAll()
    {
        return $this->affectationRepository->getAll();
    }

}