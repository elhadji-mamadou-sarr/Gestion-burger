@extends('layouts.admin')

@section('content')

    <div class="container">
        
        <div class="card">

            <div class="card-header">
                <h2>Ajouter une catégorie</h2>

            </div>

            <div class="card-body">
                <form action="{{ route('categories.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Nom</label>
                        <input type="text" name="nom" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control"></textarea>
                    </div>
                    <button type="submit" class="btn btn-success">Enregistrer</button>
                    <a href="{{ route('categories.index') }}" class="btn btn-secondary">Retour</a>
                </form>
            </div>

        </div>

    </div>

@endsection
