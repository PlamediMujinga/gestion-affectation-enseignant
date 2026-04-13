@extends('layouts.sousProved')

@section('title', 'Dashboard')

@section('content')

<h4 class="mb-3"><strong>Bienvenue, Sous-Proved</strong></h4>

<!-- STATS -->
<div class="row g-3 mb-4">
    <div class="col-md-3 col-6">
        <div class="card card-custom gradient-green p-3">
            <h6><i class="fa fa-school"></i>Ecoles</h6>
            <h3>6</h3>
        </div>
    </div>

    <div class="col-md-3 col-6">
        <div class="card card-custom gradient-blue p-3">
            <h6><i class="fa fa-users"></i>Enseignants</h6>
            <h3>18</h3>
        </div>
    </div>

    <div class="col-md-3 col-6">
        <div class="card card-custom gradient-orange p-3">
            <h6><i class="fa fa-envelope"></i>Demandes</h6>
            <h3>3</h3>
        </div>
    </div>

    <div class="col-md-3 col-6">
        <div class="card card-custom gradient-red p-3">
            <h6><i class="fa fa-briefcase"></i>Postes Vacants</h6>
            <h3></h3>
        </div>
    </div>
</div>

<div class="row g-3">
    <!-- ECOLES -->
    <div class="col-lg-6">
        <div class="card p-3 shadow-sm">
            <h5>Gestion des Ecoles</h5>
            <input class="form-control my-2" placeholder="Rechercher une école">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Code</th>
                            <th>Localisation</th>
                            <th>Directeur</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>Ecole</td>
                            <td>EN-00789</td>
                            <td>Kinshasa</td>
                            <td>Mr</td>
                        </tr>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- ENSEIGNANTS -->
    <div class="col-lg-6">
        <div class="card p-3 shadow-sm">
            <div class="d-flex justify-content-between">
                <h5>Gestion des Enseignants</h5>
                <button class="btn btn-success btn-sm">+ Ajouter</button>
            </div>
            <input class="form-control my-2" placeholder="Rechercher une enseignant">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Ecole</th>
                            <th>Matière</th>
                            <th>Statut</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>Mr </td>
                            <td>ECOLE</td>
                            <td>CHIMIE</td>
                            <td><span class="badge bg-success">actif</span></td>
                            <td>
                                <i class="fa fa-eye"></i>
                                <i class="fa fa-pen text-primary"></i>
                                <i class="fa fa-trash text-danger"></i>
                            </td>
                        </tr>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- DEMANDES -->
    <div class="col-lg-4">
        <div class="card p-3 shadow-sm">
            <h5>Demandes</h5>
            <div class="d-flex justify-content-between mb-2">
                <span>ECOLE </span>
                <span class="badge bg-warning">71</span>
            </div>
            
        </div>
    </div>

    <!-- AFFECTATION -->
    <div class="col-lg-4">
        <div class="card p-3 shadow-sm">
            <h5>Affectation</h5>
            <form>
                
                <select name="enseignant_id" class="form_select mb-2">
                    
                    <option value=1></option>
                    
                </select>

                <select name="ecole_id" class="form_select mb-2">
                    
                    <option value="2 soir"></option>
                
                </select>
                <button class="btn btn-succes-w100"></button>
            </form>
        </div>
    </div>

    <!-- STATS -->
    <div class="col-lg-4">
        <div class="card p-3 shadow-sm">
            <h5>Statistiques</h5>
            <p>Total : </p>
            <p>Demandes traitées : </p>
            <p>Postes vacants : </p>
        </div>
    </div>

</div>

@endsection