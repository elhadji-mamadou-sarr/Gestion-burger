@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Détails de la Commande #{{ $order->id }}</h1>

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>Informations de la commande</h4>
                </div>
                <div class="card-body">
                    <p><strong>Utilisateur :</strong> {{ $order->user->nom }} {{ $order->user->nom }}</p>
                    <p><strong>Statut :</strong> {{ App\Models\Order::STATUSES[$order->status] }}</p>
                    <p><strong>Montant Total :</strong> {{ number_format($order->total_amount, 2, ',', ' ') }} FCFA</p>
                    <p><strong>Date de création :</strong> {{ $order->created_at->format('d/m/Y H:i') }}</p>

                    <form action="{{ route('commandes.updateStatus', $order) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <label for="status">Modifier le statut :</label>
                        <select name="status" id="status" class="form-control d-inline w-auto" onchange="this.form.submit()">
                            @foreach(App\Models\Order::STATUSES as $key => $label)
                                <option value="{{ $key }}" {{ $order->status == $key ? 'selected' : '' }}>{{ $label }}</option>
                            @endforeach
                        </select>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h4>Récapitulatif des produits</h4>
                </div>
                <div class="card-body">
                    @foreach($order->products as $product)
                        <div class="d-flex justify-content-between mb-2">
                            <div>
                                <strong>{{ $product->name }}</strong>  
                                <span class="text-muted">x {{ $product->pivot->quantity }}</span>
                            </div>
                            <div>
                                {{ number_format($product->price * $product->pivot->quantity, 2, ',', ' ') }} FCFA
                            </div>
                        </div>
                    @endforeach
                    <hr>
                    <div class="d-flex justify-content-between fw-bold">
                        <span>Total :</span>
                        <span>{{ number_format($order->total_amount, 2, ',', ' ') }} FCFA</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <a href="{{ route('commandes.index') }}" class="btn btn-secondary mt-3">Retour à la liste des commandes</a> --}}

</div>
@endsection
