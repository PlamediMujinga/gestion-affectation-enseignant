@extends('layouts.enseignant')


@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4><strong>Historiques des Affectations</strong></h4>
    </div>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0 align-middle">
                <thead class="bg-light">
                    <tr>
                        <th class="px-4 py-3">Code Ecole</th>
                        <th class="py-3">Nom Ecole</th>
                        <th class="py-3">Type</th>
                        <th class="py-3">Date</th>
                    </tr>
                </thead>
                <tbody>
                     
                    @forelse($affectations as $affectation)
                    @php
                        $ecole = $affectation->enseignant;
                    @endphp
                    <tr>
                        <td class="px-4">{{ $ecole->code_ecole }}</td>
                        <td>{{ $ecole->nom }}</td>
                        <td>{{ $affectation->type }}</td>
                        <td>{{ $affectation->date_affectation }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center py-5 text-muted">
                            <i class="fas fa-folder-open fa-3x mb-3 d-d-block"></i>
                            Aucune affectation trouvée.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    
</div>

@endsection