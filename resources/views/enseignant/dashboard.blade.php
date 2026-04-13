@extends('layouts.enseignant')

@section('content')

<h3 class="mb-3 py-1"><strong>Bienvenue, {{ auth()->user()->nom }}</strong></h3>

<div class="row g-3 py-3">
    <div class="col-12 col-sm-6 col-md-3">
        <div class="stat-card green">
            <h3>0</h3>
            <p>Demandes Effectuées</p>
        </div>
    </div>

    <div class="col-12 col-sm-6 col-md-3">
        <div class="stat-card orange">
            <h3>0</h3>
            <p>Affectations</p>
        </div>
    </div>

    <div class="col-12 col-sm-6 col-md-3">
        <div class="stat-card blue">
            <h3>0</h3>
            <p>Demandes Rejetées</p>
        </div>
    </div>

    <div class="col-12 col-sm-6 col-md-3">
        <div class="stat-card purple">
            <h3>0</h3>
            <p>Transfert/Mutation</p>
        </div>
    </div>

</div>

<div class="custom-card mt-4">
    <h6><strong>Dernières Demandes/Affectations</strong></h6>
    <hr>
    <p>Aucune affectation reçue</p>
</div>

@endsection