@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        
        <div class="col-md-8">
            <div class="card">

                <div class="card-header">
                    <h2>Finalisation de la commande</h2>
                </div>
                
                <div class="card-body">
                
                <form method="POST" action="{{ route('checkout.store') }}">

                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nom</label>
                        <input type="text" class="form-control" id="nom" name="nom" 
                            value="{{ old('nom', Auth::user()->nom ?? '') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label">Prénom</label>
                        <input type="text" class="form-control" id="prenom" name="prenom" 
                            value="{{ old('prenom', Auth::user()->prenom ?? '') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label">Téléphone</label>
                        <input type="tel" class="form-control" id="phone" name="telephone" 
                            value="{{ old('telephone' , Auth::user()->telephone ?? '' )}} "required>
                    </div>

                    <div class="mb-3">
                        <label for="address" class="form-label">Adresse de livraison</label>
                        <textarea class="form-control" id="address" name="addresse" 
                                rows="3" required>{{ old('address', Auth::user()->adresse ?? '' ) }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary btn-lg">
                        Confirmer la commande
                    </button>
                </form>
            </div>
        </div>
    </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h4>Récapitulatif</h4>
                </div>
                <div class="card-body">
                    @foreach($products as $product)
                    <div class="d-flex justify-content-between mb-2">
                        <div>
                            {{ $product->name }} 
                            <span class="text-muted">x</span>
                            <input type="number" name="quantity[{{ $product->id }}]" value="{{ $product->quantity }}" min="1" max="{{ $product->stock }}" class="form-control-sm" style="width: 60px; display: inline;">
                            <span class="text-muted">({{ $product->stock }} disponibles)</span>
                        </div>
                        
                        <div>
                            {{ number_format($product->price * $product->quantity, 0, ',', ' ') }} FCFA
                        </div>
                    </div>
                    @endforeach
                    
                    <hr>
                    <div class="d-flex justify-content-between fw-bold">
                        <span>Total :</span>
                        <span>{{ number_format($total, 0, ',', ' ') }} FCFA</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection