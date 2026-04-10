@extends('layouts.proved')

@section('content')

<h4>Gestion des Écoles</h4>

<div class="table-container">
<table class="table">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Code</th>
            <th>Type</th>
            <th>province</th>
            <th>Sudivision</th>
            <th> Nb.Enseignants</th>

            
        </tr>
    </thead>

    <tbody>
        @php  $divs=$proved->sousProved; $province=$proved->province; $enseignant=$proved->enseignant; @endphp
        @foreach($divs as $div)
            @php $ecoles=$div->ecole()->get(); @endphp
                @foreach($ecoles as $ecole)
                    @php $nb=$ecole->enseignant()->count(); @endphp
                        <tr>
                            <td>{{ $ecole->nom }}</td>
                            <td>{{ $ecole->code_ecole }}</td>
                            <td>{{ $ecole->type }}</td>
                            <td>{{ $province->nom }}</td>
                            <td>{{ $div->nom }}</td>
                            <td>{{ $nb}}</td>
                            <td>
                                <form method="POST" action="/proved/ecoles/{{ $ecole->id }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">Supprimer</button>
                                </form>
                            </td>
  
                        </tr>
                   
                @endforeach
        @endforeach
    </tbody>
</table>
</div>

@endsection