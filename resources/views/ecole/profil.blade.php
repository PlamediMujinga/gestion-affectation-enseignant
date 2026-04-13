@extends('layouts.ecole')

@section('content')

<h4><strong>Profil de l'école</strong></h4>
<p>Information de votre établissement</p>

<div class="custom d-flex">
    <div class="custom-card flex-grow-1 flex-basis-0 mt-4" style="max-width:75%;">
        <h5><strong>Information Générale</strong></h5>
        <hr>
        <p><strong>Code Ecole :</strong> {{ $ecole->code_ecole }}</p>
        <p><strong>Nom :</strong> {{ $ecole->nom }}</p>
        <p><strong>Type :</strong> {{ $ecole->type }}</p>

        <hr>    
        <p><strong>Email :</strong> {{ $ecole->email }}</p>
        <p><strong>Telephone :</strong> {{ $ecole->telephone }}</p>
        <p><strong>Adresse :</strong> {{ $ecole->adresse }}</p>

        <hr>    
        <p><strong>Division :</strong> {{ $ecole->sousProved->nom }}</p>
        <p><strong>Province éducationnelle :</strong> {{ $ecole->sousProved->proved->nom }}</p>
        <p><strong>Province administrative :</strong> {{ $ecole->sousProved->proved->province->nom }}</p>
    
    
    </div>

        <!-- Bloc droit : reste petit -->
    <div class="custom-card flex-shrink-0  align-self-start ms-4 mt-4">
        <h5><strong>Statistiques</strong></h5>
        <br>
        <p>Enseignants en poste</p>
        <p><strong>{{ $ecole->enseignant()->count() }}</strong></p>
        <hr>
        <p>Postes vacants</p>
        <p><strong>{{ $ecole->poste_vacant }}</strong></p>
        <hr>
        <p>Total Elèves</p>
        <p><strong>{{ $ecole->nombre_eleves }}</strong></p>
    </div>
</div>

@endsection