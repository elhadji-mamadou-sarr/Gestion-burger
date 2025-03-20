@extends('layouts.admin')

@section('content')
    <div class="container">
        
        <div class="card">
            <div class="card-header">
                
                <h2>Modifier la catégorie</h2>
            </div>

            <div class="card-body">
                <form action="{{ route('categories.update', $categorie) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">Nom</label>
                        <input type="text" name="nom" class="form-control" value="{{ $categorie->nom }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control">{{ $categorie->description }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Mettre à jour</button>
                    <a href="{{ route('categories.index') }}" class="btn btn-secondary">Retour</a>
                </form>
            </div>
        </div>

    </div>
@endsection
