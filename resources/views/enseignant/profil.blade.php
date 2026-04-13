
@extends('layouts.enseignant')

@section('content')

<h3><strong> Mon Profil</strong></h3>

<div class="custom-card mt-4" style="width:75%;">
    <h4> Identité</h4>
    <hr>
    <p><strong>Nom :</strong> {{ $enseignant->nom }}</p>
    <p><strong>Post-Nom :</strong> {{ $enseignant->postnom }}</p>
    <p><strong>Prenom :</strong> {{ $enseignant->prenom }}</p>
    <br>
    <h4> Contact</h4>
    <hr>
    <p><strong>Email :</strong> {{ $enseignant->email }}</p>
    <p><strong>Telephone :</strong> {{ $enseignant->telephone }}</p>
    <p><strong>Adresse :</strong> {{ $enseignant->adresse }}</p>
    <br>
    <h4> Etudes Faites</h4>
    <hr>
    <p><strong>Niveau d'étude :</strong> {{ $enseignant->niveau_etude }}</p>
    <p><strong>Specialité :</strong> {{ $enseignant->specialite }}</p>
    <br>
    <h4> Affectation Actuelle</h4>
    <hr>
    @if($enseignant->ecole)
        <p><strong>Ecole :</strong> {{ $enseignant->ecole->nom }}</p>
        <p><strong>Division :</strong> {{ $enseignant->ecole->sousProved->nom }}</p>
        <p><strong>Province éducationnelle :</strong> {{ $enseignant->ecole->sousProved->proved->nom }}</p>
        <p><strong>Province administrative :</strong> {{ $enseignant->ecole->sousProved->proved->province->nom }}</p>
    @else
        <p class="text-danger">Non affecté à une école.</p>
    @endif
    
</div>
@endsection