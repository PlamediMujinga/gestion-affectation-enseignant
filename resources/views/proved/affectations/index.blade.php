@extends('layouts.proved')

@section('content')

<h2 class="mb-4">Affectations des Enseignants</h2>

<!-- FORMULAIRE -->
<div class="card p-3 mb-4 shadow-sm">
    <form method="POST" action="/proved/affectations">
        @csrf

        <div class="row">

            <div class="col-md-4 mb-2">
                <select name="enseignant_id" class="form-control">
                    <option>Selectionner Enseignant</option>
                    @foreach($enseignants as $enseignant)
                        <option value="{{ $enseignant->id }}">{{ $enseignant->nom }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-4 mb-2">
                <select name="ecole_id" class="form-control">
                    <option>Selectionner École</option>
                    @foreach($ecoles as $ecole)
                        <option value="{{ $ecole->id }}">{{ $ecole->nom }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-4 mb-2">
                <select name="province_id" class="form-control">
                    <option>Province</option>
                    @foreach($provinces as $province)
                        <option value="{{ $provience->id }}">{{ $provience->nom }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-4 mb-2">
                <select name="subdivision_id" class="form-control">
                    <option>Subdivision</option>
                    @foreach($divs as $div)
                        <option value="{{ $div->id }}">{{ $div->nom }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-4 mb-2">
                <input type="date" name="date" class="form-control">
            </div>

            <div class="col-md-4">
                <button class="btn btn-success w-100">Affecter</button>
            </div>

        </div>
    </form>
</div>

<!-- HISTORIQUE -->
<div class="card p-3 shadow-sm">
    <h5>Historique des Affectations</h5>

    <table class="table">
        <thead>
            <tr>
                <th>Enseignant</th>
                <th>École</th>
                <th>Province</th>
                <th>Date</th>
                <th>Statut</th>
            </tr>
        </thead>

        <tbody>
        @foreach($affectations as $aff)
        <tr>
            <td>{{ $aff->enseignant->nom }}</td>
            <td>{{ $aff->ecole->nom }}</td>
            <td>{{ $aff->province->nom }}</td>
            <td>{{ $aff->date }}</td>
            <td>
                <span class="badge bg-success">Validée</span>
            </td>
        </tr>
        @endforeach
        </tbody>

    </table>
</div>

@endsection