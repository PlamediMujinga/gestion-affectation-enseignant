<?php

namespace App\Http\Controllers\SousProved;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDemandeRequest;
use App\Services\DemandeService;
use App\Services\AffectationService;
use App\Services\AuditService;
use Illuminate\Support\Facades\Auth;

class SousProvedController extends Controller
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
        $sProved = $this->sousProvedConnect();
        $ecoles = $sProved->ecole()->latest()->first();
        return view('sousProved.dashboard', compact('sProved','ecoles'));
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

    private function sousProvedConnect()
    {
        return auth()->user()->sousProved()->with(['proved.province'])->first();
    }

    
}