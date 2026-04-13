@extends('layouts.ecole')

@section('content')

<h4><strong>Bienvenue, Directeur</strong></h4>
<p>Voici un aperçu de la situation de l'école</p>

<div class="custom-card mt-4 d-flex align-items-center">
    <div class="ms-3  me-3 mb-5"><i class="fas fa-bank fa-4x"></i></div>
    <div>
        <p class="small"><strong>{{ $ecole->nom }}</strong></p>
        <p class="small"><strong>Type :</strong> Publique</p>
        <p class="small"><strong>Localisation :</strong> {{ $ecole->sousProved->proved->province->nom }}</p>
        <p class="small"><strong>Code Ecole :</strong> {{ $ecole->code_ecole }}</p>
        
    </div>
</div>

<h5 class="py-1 ms-1"><strong>Résumé</strong></h5>

<div class="row g-3">
    <div class="col-12 col-sm-6 col-md-3">
        <div class="stat-card green">
            <h3>{{ $ecole->enseignant()->count() }}</h3>
            <p>Enseignants</p>
        </div>
    </div>

    <div class="col-12 col-sm-6 col-md-3">
        <div class="stat-card orange">
            <h3>{{ $ecole->affectation()->count() }}</h3>
            <p>Affectations</p>
        </div>
    </div>

    <div class="col-12 col-sm-6 col-md-3">
        <div class="stat-card blue">
            <h3>{{ $count }}</h3>
            <p>Demandes en attente</p>
        </div>
    </div>

    <div class="col-12 col-sm-6 col-md-3">
        <div class="stat-card red">
            <h3>0</h3>
            <p>Transfert</p>
        </div>
    </div>

</div>

<h5 class="py-2 ms-1 mt-4"><strong>Dernières Demandes/Affectations</strong></h5>

<div class="custom-card mt-1">
    @forelse($derniereDemande as $demande)
        <p><strong>Dernière demande :</strong> Le {{ $demande->created_at->format('d/m/Y') }}</p>
    @empty
        <p class="text-muted">Aucune demande éffectuée</p>
    @endforelse
    
    <hr>
    @if($derniereAffectation)

        <p><strong>Dernière demande le :</strong>{{ $derniereAffectation->created_at->format('d/m/Y') }}</p>
    @else
        <p class="text-muted">Aucune affectation reçue</p>
    @endif
</div>

@endsection