@extends('layouts.proved')

@section('content')

<h4>Gestion des Enseignants</h4>

<div class="table-container">
<table class="table">
    <tr>
        <th>Nom</th>
        <th>Matricule</th>
        <th>École</th>
        <th>Actions</th>
        
    </tr>
    @php  $divs=$proved->sousProved; $province=$proved->province; $enseignant=$proved->enseignant; @endphp
        @foreach($divs as $div)
            
            @php $ecoles=$div->ecole()->get(); @endphp
                @foreach($ecoles as $ecole)
                    @php $enseignants=$ecole->enseignant()->get(); @endphp
                    @foreach($enseignants as $enseignant)
                        <tr>
                            <td>{{ $enseignant->nom }}</td>
                            <td>{{ $enseignant->matricule }}</td>
                            <td>{{ $enseignant->ecole->nom }}</td>
                            <td>
                                <button class="btn btn-primary btn-sm">Voir</button>
                                <button class="btn btn-danger btn-sm">Supprimer</button>
                            </td>
                                                
                            
                        </tr>
                    @endforeach
                @endforeach
        @endforeach

</table>
</div>

@endsection