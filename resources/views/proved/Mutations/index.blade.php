@extends('layouts.proved')

@section('content')

<h2 class="mb-4">Mutation des Enseignants</h2>

<!-- FORMULAIRE -->
<div class="card p-3 mb-4 shadow-sm">

<form method="POST" action="/proved/mutations">
@csrf

<div class="row">

    <div class="col-md-4 mb-2">
        <select name="enseignant_id" id="enseignant" class="form-control">
            <option>Choisir Enseignant</option>
            @foreach($enseignants as $enseignant)
                <option value="{{ $ens->id }}" data-ecole="{{ optional($ens->affectation->ecole)->nom }}">
                    {{ $enseignant->nom }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="col-md-4 mb-2">
        <input type="text" id="ancienne_ecole" class="form-control" placeholder="Ancienne école" readonly>
        <input type="hidden" name="ancienne_ecole_id" id="ancienne_ecole_id">
    </div>

    <div class="col-md-4 mb-2">
        <select name="nouvelle_ecole_id" class="form-control">
            <option>Nouvelle école</option>
            @foreach($ecoles as $ecole)
                <option value="{{ $ecole->id }}">{{ $ecole->nom }}</option>
            @endforeach
        </select>
    </div>

    <div class="col-md-4 mb-2">
        <input type="date" name="date" class="form-control">
    </div>

    <div class="col-md-4 mb-2">
        <input type="text" name="motif" class="form-control" placeholder="Motif">
    </div>

    <div class="col-md-4">
        <button class="btn btn-primary w-100">Muter</button>
    </div>

</div>

</form>
</div>

<!-- HISTORIQUE -->
<div class="card p-3 shadow-sm">
    <h5>Historique des Mutations</h5>

    <table class="table">
        <thead>
            <tr>
                <th>Enseignant</th>
                <th>Ancienne École</th>
                <th>Nouvelle École</th>
                <th>Date</th>
                <th>Motif</th>
            </tr>
        </thead>

        <tbody>
        @foreach($mutations as $mutation)
            <tr>
                <td>{{ $mutation->enseignant->nom }}</td>
                <td>{{ $mutation->ancienneEcole->nom }}</td>
                <td>{{ $mutation->nouvelleEcole->nom }}</td>
                <td>{{ $mutation->date }}</td>
                <td>{{ $mutation->motif }}</td>
            </tr>
        @endforeach
        </tbody>

    </table>
</div>

<!-- SCRIPT AUTO REMPLISSAGE -->
<script>
document.getElementById('enseignant').addEventListener('change', function () {
    let selected = this.options[this.selectedIndex];
    let ecole = selected.getAttribute('data-ecole');

    document.getElementById('ancienne_ecole').value = ecole;
});
</script>

@endsection