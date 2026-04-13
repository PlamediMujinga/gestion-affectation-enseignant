<?php

namespace App\Http\Controllers\Ecole;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDemandeRequest;
use App\Services\DemandeService;
use App\Services\AffectationService;
use App\Services\AuditService;
use Illuminate\Support\Facades\Auth;

class EcoleController extends Controller
{
    protected $demandeService;
    protected $affectationService;
    protected $auditService;

    public function __construct(DemandeService $demandeService, AffectationService $affectationService, AuditService $auditService)
    {
        $this->demandeService = $demandeService;
        $this->affectationService = $affectationService;
        $this->auditService =$auditService;
    }
    
    public function index()
    {
        $ecole = $this->ecoleConnect();
        $count = $this->demandeService->getCountDemande($ecole->id, 'ecole');
        $derniereDemande = $this->demandeService->getRecentDemande($ecole->id, 'ecole', 1);
        $derniereAffectation = $ecole->affectation()->latest()->first();
        return view('ecole.dashboard', compact('derniereDemande','derniereAffectation', 'count', 'ecole'));
    }

    public function listeEnseignant()
    {
        $ecole = $this->ecoleConnect();

        $enseignants = $ecole->enseignant;
        
        return view('ecole.enseignants.index', compact('enseignants', 'ecole'));
    }

    public function posteVacant()
    {
        $ecole = $this->ecoleConnect();
        
        return view('ecole.enseignants.poste', compact('ecole'));
    }

    public function historicDemande()
    {
        $ecole = $this->ecoleConnect();

        $demandes =$this->demandeService->getDemandeById($ecole->id, 'ecole');
        
        return view('ecole.demandes.index', compact('demandes', 'ecole'));
    }

    public function createDemande()
    {
        return view('ecole.demandes.create');
    }

    public function storeDemande(StoreDemandeRequest $request)
    {
        $ecole = $this->ecoleConnect();
        $this->demandeService->creerDemandeEcole($ecole, $request->validated());
        //Log pour la demande faite
        $this->auditService->log(
            'sending_demande',
            'Envoi demande ecole : ' . $ecole['email']
        );

        return back()->with('success', 'Demande envoyée');
    }

    public function historicAffectation()
    {
        $ecole = $this->ecoleConnect();
        $affectations =$this->affectationService->getById($ecole->id, 'ecole');
        
        return view('ecole.affectations.index', compact('affectations', 'ecole'));
    }

    public function profil()
    {
        $ecole = $this->ecoleConnect();
        return view('ecole.profil', compact('ecole'));
    }

    private function ecoleConnect()
    {
        return auth()->user()->ecole()->with(['sousProved.proved.province'])->first();
    }

    
}