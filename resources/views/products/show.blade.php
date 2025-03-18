@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Détails du Produit</h1>

        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{ $product->name }}</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <!-- Image du produit -->
                    <div class="col-md-4 text-center">
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" 
                            class="img-fluid rounded" style="max-width: 100%; height: auto;">
                    </div>

                    <!-- Détails du produit -->
                    <div class="col-md-8">
                        <p><strong>Nom :</strong> {{ $product->name }}</p>
                        <p><strong>Description :</strong> {{ $product->description }}</p>
                        <p><strong>Prix :</strong> {{ number_format($product->price, 2, ',', ' ') }} €</p>
                        <p><strong>Stock :</strong> {{ $product->stock }}</p>
                        <p><strong>Catégorie :</strong> {{ $product->category->name ?? 'Non catégorisé' }}</p>
                        <p><strong>Ajouté le :</strong> {{ $product->created_at->format('d/m/Y H:i') }}</p>
                    </div>
                </div>

                <!-- Boutons d'action -->
                <div class="mt-4">
                    <a href="{{ route('products.edit', $product) }}" class="btn btn-warning">
                        <i class="flaticon-pencil"></i> Modifier
                    </a>
                    <form action="{{ route('products.destroy', $product) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Voulez-vous vraiment supprimer ce produit ?')">
                            <i class="flaticon-interface-5"></i> Supprimer
                        </button>
                    </form>
                    <a href="{{ route('products.index') }}" class="btn btn-secondary">
                        <i class="flaticon-back"></i> Retour à la liste
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
