@extends('layouts.proved')

@section('content')

<h2 class="mb-4">Gestion des Écoles</h2>

<!-- FORMULAIRE -->
<div class="card p-3 mb-4 shadow-sm">
<form method="POST" action="/proved/ecoles">
@csrf

<div class="row">

    <div class="col-md-4 mb-2">
        <input type="text" name="nom" class="form-control" placeholder="Nom école">
    </div>

    <div class="col-md-4 mb-2">
        <input type="text" name="code" class="form-control" placeholder="Code école">
    </div>

    <div class="col-md-4 mb-2">
        <select name="type" class="form-control">
            <option>Type</option>
            <option>Primaire</option>
            <option>Secondaire</option>
        </select>
    </div>

    <div class="col-md-4 mb-2">
        <select name="province_id" class="form-control">
            <option>Province</option>
            @foreach($provinces as $p)
                <option value="{{ $p->id }}">{{ $p->nom }}</option>
            @endforeach
        </select>
    </div>

    <div class="col-md-4 mb-2">
        <select name="subdivision_id" class="form-control">
            <option>Subdivision</option>
            @foreach($subdivisions as $s)
                <option value="{{ $s->id }}">{{ $s->nom }}</option>
            @endforeach
        </select>
    </div>

    <div class="col-md-4">
        <button class="btn btn-success w-100">Ajouter</button>
    </div>

</div>

</form>
</div>

@endsection