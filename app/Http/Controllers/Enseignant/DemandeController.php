<?php

namespace App\Http\Controllers\Enseignant;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDemandeRequest;
use App\Services\DemandeService;
use App\Services\AuditService;
use Illuminate\Support\Facades\Auth;

class DemandeController extends Controller
{
    protected $demandeService;
    protected $auditService;

    public function __construct(DemandeService $demandeService, AuditService $auditService)
    {
        $this->demandeService = $demandeService;
        $this->auditService =$auditService;
    }

    private function enseignantConnect()
    {
        return auth()->user()->enseignant()->with(['ecole.sousProved.proved.province'])->first();
    }

    public function index()
    {
        $enseignant = $this->enseignantConnect();

        $demandes =$this->demandeService->getDemandeById($enseignant->id, 'enseignant');
        
        return view('enseignant.demandes.index', compact('demandes', 'enseignant'));
    }

    public function create()
    {
        return view('enseignant.demandes.create');
    }

    public function store(StoreDemandeRequest $request)
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
}