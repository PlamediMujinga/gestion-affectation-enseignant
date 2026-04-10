@extends('layouts.proved')

@section('content')

<h2 class="mb-4">Divisions & Subdivisions</h2>

<div class="card p-3 shadow-sm">
    <table class="table table-bordered align-middle">
        <thead class="table-success">
            <tr>
                <th>Province</th>
                <th>Division</th>
                <th>Subdivision</th>
                <th>Écoles</th>
                <th>Enseignants</th>
            </tr>
        </thead>

        <tbody>
        @php  $divs=$proved->sousProved; $province=$proved->province; $enseignant=$proved->enseignant; @endphp
        @foreach($divs as $div)
            @php $ecoles=$div->ecole()->get(); @endphp
                @foreach($ecoles as $ecole)
                    @php $nb=$ecole->enseignant()->count(); @endphp
                    @php $enseignants=$ecole->enseignant()->get(); @endphp
                    @foreach($enseignants as $enseignant)
                        @php $nbe=$enseignant->ecole()->count(); @endphp
                        <tr>
                            <td>{{ $province->nom}}</td>
                            <td>{{ $div->nom }}</td>
                            <td>{{ $ecole->nom }}</td>
                            <td>{{ $nb}}</td>
                            <td>{{ $nbe}}</td>
                        </tr>

                    @endforeach
                @endforeach
        @endforeach
        </tbody>
    </table>
</div>

@endsection