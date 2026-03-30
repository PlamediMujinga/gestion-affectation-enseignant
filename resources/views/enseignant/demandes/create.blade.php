
@extends('layouts.enseignant')

@section('content')

<div class="container mt-4">
    <div class="row-justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white py-3">
                    <h5 class="mb-0 text-primary"><i class="fas fa-edit me-2"></i>Formulaire de Nouvelle Demande</h5>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('demandes.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-4">
                            <label for="type_demande" class="form-label fw-bold">Type de la demande</label>
                            <select class="form-select @error('type_demande') is-invalid @enderror" name="type_demande" 
                                    id="type_demande" required>
                                <option value="" selected disabled>Choisir un type...</option>
                                <option value="demande_transfert">Mutation/Transfert</option>
                                <option value="demande_affectation">Affectation</option>
                                <option value="manque_enseignant">Manque d'enseignant</option>
                                <option value="Surplus_enseignant">Surplus d'enseignant(Transfert d'enseignant)</option>
                            </select>
                            @error('type_demande')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="emetteur_type" class="form-label fw-bold">Entité demandeur</label>
                            <select class="form-select" name="emetteur_type" 
                                    id="emetteur_type" required>
                                <option value="" selected disabled>Choisir un type...</option>
                                <option value="enseignant">Enseignant</option>
                                <option value="ecole">Ecole</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="Commentaire" class="form-label fw-bold">Commentaire</label>
                            <textarea class="form-control" name="descritpion" row="30" placeholder="Saississez un commentaire/detail pour votre demande"></textarea>
                        </div>
                        <hr>
                        <div>
                            <a href="{{ route('demandes.index') }}" class="btn btn-light border">Annuler</a>
                            <button type="submit" class="btn btn-primary px-4">
                                <i class="fas fa-paper-plane me-2"></i> Soumettre ma demande
                            </button>
                        </div>
                    </form>
                </div>
            </div>    
        </div>
    </div>
</div>

@endsection