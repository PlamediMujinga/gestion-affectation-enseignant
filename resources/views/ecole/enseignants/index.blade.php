@extends('layouts.ecole')


@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4><strong>Liste des Enseignants</strong></h4>
        <a href="{{ route('enseignant.poste')}}" class="btn btn-primary shadow-sm">
            <i class="fas fa-plus-circle me-2"></i>Postes Vacants</a>
    </div>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0 align-middle">
                <thead class="bg-light">
                    <tr>
                        <th class="px-4 py-3">Matricule</th>
                        <th class="py-3">Nom</th>
                        <th class="py-3">Post-Nom</th>
                        <th class="py-3 ">Prénom</th>
                        <th class="py-3">Niveau d'étude</th>
                        <th class="py-3">Spécialité</th>
                        <th class="py-3">Statut</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($enseignants as $enseignant)
                    
                    <tr>
                        <td>
                            <span class="px-3 fw-bold text-dark">{{ $enseignant->matricule }}</span>
                        </td>
                        <td>
                            {{ $enseignant->nom }}
                        </td>
                        <td>
                            {{ $enseignant->postnom }}
                        </td>
                        <td>
                            {{ $enseignant->prenom }}
                        </td>
                        <td>
                            @if($enseignant->niveau_etude == 'Diplome_etat')
                                <span>Diplôme d'etat</span>
                            @elseif($enseignant->niveau_etude == 'Licence')
                                <span>Licence</span>
                            @else
                                <span>Graduat</span>
                            @endif
                        </td>
                        <td>{{ $enseignant->specialite }}</td>
                        <td>
                            @if($enseignant->statut == 'en_attente')
                                <span class="badge rounded-pill bg-warning text-dark">En attente</span>
                            @elseif($enseignant->statut == 'actif')
                                <span class="badge rounded-pill bg-success">Actif</span>
                            @else
                                <span class="badge rounded-pill bg-danger">Suspendu</span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center py-5 text-muted">
                            <i class="fas fa-folder-open fa-3x mb-3 d-d-block"></i>
                            Aucun enseignant trouvé.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    
</div>

@endsection