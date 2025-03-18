@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Votre Panier</h2>
    
    @if($products->isEmpty())
        <div class="alert alert-info">
            Votre panier est vide
        </div>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Produit</th>
                    <th>Prix unitaire</th>
                    <th>Quantité</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td>
                        <img src="{{ asset('storage/' . $product->image) }}" 
                             alt="{{ $product->name }}" 
                             style="width: 100px;">
                        {{ $product->name }}
                    </td>
                    <td>{{ number_format($product->price, 0, ',', ' ') }} FCFA</td>
                    <td>
                        <form action="{{ route('cart.update', $product->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="number" 
                                   name="quantity" 
                                   value="{{ $product->quantity }}" 
                                   min="1" 
                                   max="{{ $product->stock + $product->quantity }}"
                                   class="form-control" 
                                   style="width: 80px; display: inline-block;">
                                   
                            <button type="submit" class="btn btn-primary">
                                <i class="flaticon-repeat"></i>
                            </button>
                            
                        </form>
                    </td>
                    <td>{{ number_format($product->total, 0, ',', ' ') }} FCFA</td>
                    <td>
                        <form action="{{ route('cart.remove', $product->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3" class="text-end"><strong>Total général :</strong></td>
                    <td colspan="2">{{ number_format($totalPanier, 0, ',', ' ') }} FCFA</td>
                </tr>
            </tfoot>
        </table>
        
        <div class="text-end">
            <a href="{{ route('menu') }}" class="btn btn-secondary">
                Continuer mes achats
            </a>
            <a href="{{ route('checkout') }}" class="btn btn-primary">
                Commander maintenant
            </a>
        </div>
    @endif
</div>
@endsection