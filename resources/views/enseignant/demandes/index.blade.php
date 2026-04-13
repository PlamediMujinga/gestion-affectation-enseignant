@extends('layouts.enseignant')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="h4"><strong>Historiques des Demandes</strong></h2>
        <a href="{{ route('demandes.create')}}" class="btn btn-primary shadow-sm">
            <i class="fas fa-plus-circle me-2"></i>Nouvelle demande</a>
    </div>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0 align-middle">
                <thead class="bg-light">
                    <tr>
                        <th class="px-4 py-3">Type demande</th>
                        <th class="py-3">Date</th>
                        <th class="py-3">Statut</th>
                        <th class="py-3 text-end px-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($demandes as $demande)
                    
                    <tr>
                        <td class="px-4">
                            <span class="fw-bold text-dark">{{ $demande->type_demande }}</span>
                            <div class="small text-muted">ID: {{ $demande->id }}</div>
                        </td>
                        <td>{{ $demande->created_at->format('d/m/Y') }}</td>
                        <td>
                            @if($demande->statut == 'en_attente')
                                <span class="badge rounded-pill bg-warning text-dark">En attente</span>
                            @elseif($demande->statut == 'validee')
                                <span class="badge rounded-pill bg-success">Approuvée</span>
                            @else
                                <span class="badge rounded-pill bg-danger">Rejetée</span>
                            @endif
                        </td>
                        <td class="text-end px-4">
                            <a herf="#" class="btn btn-sm btn-outline-secondary">
                                <i class="fas fa-eye"></i>
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center py-5 text-muted">
                            <i class="fas fa-folder-open fa-3x mb-3 d-d-block"></i>
                            Aucune demande effectuée.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    
</div>

@endsection