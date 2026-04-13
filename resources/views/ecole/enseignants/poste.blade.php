@extends('layouts.ecole')

@section('content')

<div class="container mt-4">
    <div class="row-justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow-sm" style="max-width:50%;">
                <div class="card-header bg-white py-3">
                    <h5 class="mb-0 text-primary"><i class="fas fa-edit me-2"></i>Postes Vacants</h5>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('demandes.ecole.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-4">
                            <label for="type_demande" class="form-label fw-bold">Nombre des postes vacants</label>
                            <select class="form-select" name="poste_vacant" id="type_demande" required>
                                <option value=1 selected disabled>1</option>
                                <option value=2>2</option>
                                <option value=3>3</option>
                                <option value=4>4</option>
                                <option value=5>5</option>
                            </select>
                            @error('type_demande')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="Commentaire" class="form-label fw-bold">Commentaire</label>
                            <textarea class="form-control" name="descritpion" row="30" placeholder="Saississez un commentaire"></textarea>
                        </div>
                        <hr>
                        <div>
                            <a href="{{ route('enseignant.index') }}" class="btn btn-light border">Annuler</a>
                            <button type="submit" class="btn btn-primary px-4 ms-2">
                                <i class="fas fa-paper-plane me-2"></i>Valider
                            </button>
                        </div>
                    </form>
                </div>
            </div>    
        </div>
    </div>
</div>

@endsection