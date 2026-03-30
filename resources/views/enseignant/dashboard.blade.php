@extends('layouts.enseignant')

@section('content')

<h3 class="mb-3">Dashboard / {{ auth()->user()->nom }}</h3>

<div class="row g-3">
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
    <h6>Notifications</h6>
    <hr>

    <p>Nouvelle affectation reçue</p>
    <p>Nouvelle affectation reçue</p>
    <p>Nouvelle affectation reçue</p>
    <p>Nouvelle affectation reçue</p>
    <p>Nouvelle affectation reçue</p>
</div>

@endsection