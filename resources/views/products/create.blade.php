@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="col-md-12">
        <div class="card">
        <div class="card-header">
            <div class="card-title">{{ $product->id ? 'Modifier le produit' : 'Ajouter un produit' }}</div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12 col-lg-12">
                <form action="{{ $product->id ? route('products.update', $product) : route('products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if($product->id)
                        @method('PUT')
                    @endif
            
                    <div class="form-group">
                        <label for="name" class="form-label">Nom du produit</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $product->name) }}" equired>
                    </div>
            
                    <div class="form-group">
                        <label for="price" class="form-label">Prix</label>
                        <input type="number" step="0.01" class="form-control" id="price" name="price" value="{{ old('price', $product->price) }}" required>
                    </div>
            
                    <div class="form-group">
                        <label for="description" class="form-label">Description</label>
                    <textarea name="description" class="form-control" required>{{ old('description', $product->description) }}</textarea>

                    </div>
            
                    <div class="form-group">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" class="form-control" id="image" name="image">
                        @if($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" alt="Image actuelle" width="100" class="mt-2">
                        @endif
                    </div>
            
                    <div class="form-group">
                        <label for="stock" class="form-label">Stock</label>
                        <input type="number" class="form-control" id="stock" name="stock" value="{{ old('stock', $product->stock) }}" required>
                    </div>
                    

                    <div class="form-group">
                        <label for="categorie" class="form-label fw-bold">Catégorie</label>
                        <select class="form-control" id="categorie" name="categorie_id" required>
                            <option value="">Sélectionner une catégorie</option>
                            @foreach ($categories as $categorie)
                                <option value="{{ $categorie->id }}" {{ old('categorie_id', $product->categorie_id ?? '') == $categorie->id ? 'selected' : '' }}>
                                    {{ $categorie->nom }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="card-action">
                        <button class="btn btn-success" type="submit">Enregistrer</button>
                    </div>
                </form>
                </div>
            </div>

    </div>
</div>
    
@endsection