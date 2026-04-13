<?php

namespace App\Http\Controllers\Enseignant;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDemandeRequest;
use App\Services\DemandeService;
use App\Services\AffectationService;
use App\Services\AuditService;
use Illuminate\Support\Facades\Auth;

class EnseignantController extends Controller
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
        $enseignant = $this->enseignantConnect();
        return view('enseignant.dashboard', compact('enseignant'));
    }

    public function profil()
    {
        $enseignant = $this->enseignantConnect();
        return view('enseignant.profil', compact('enseignant'));
    }

    public function historicDemande()
    {
        $enseignant = $this->enseignantConnect();

        $demandes =$this->demandeService->getDemandeById($enseignant->id, 'enseignant');
        
        return view('enseignant.demandes.index', compact('demandes', 'enseignant'));
    }

    public function createDemande()
    {
        return view('enseignant.demandes.create');
    }

    public function storeDemande(StoreDemandeRequest $request)
    {
        $enseignant = $this->enseignantConnect();
        $this->demandeService->creerDemandeEnseignant($enseignant, $request->validated());
        //Log pour la demande faite
        $this->auditService->log(
            'sending_demande',
            'Envoi demande enseignant : ' . $enseignant['email']
        );

        return back()->with('success', 'Demande envoyée');
    }

    public function historicAffectation()
    {
        $enseignant = $this->enseignantConnect();
        $affectations =$this->affectationService->getById($enseignant->id, 'enseignant');
        
        return view('enseignant.affectations.index', compact('affectations', 'enseignant'));
    }

    private function enseignantConnect()
    {
        return auth()->user()->enseignant()->with(['ecole.sousProved.proved.province'])->first();
    }

    
}