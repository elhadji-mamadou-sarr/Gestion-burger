@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <span>Catalogue des Produits</span>
                        <a href="{{ route('cart.show') }}" class="btn btn-primary">
                            <i class="fas fa-shopping-cart"></i> 
                            Panier (<span class="cart-count">{{ cartCount() }}</span>)
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        @foreach($products as $product)
                        <div class="col-md-4 mb-4">
                            <div class="card h-100">
                                <img src="{{ asset('storage/' . $product->image) }}" 
                                     class="card-img-top rounded" 
                                     alt="{{ $product->name }}"
                                     style="height: 220px; width: 100%;">
                                
                                <div class="card-body">
                                    <h5 class="card-title">{{ $product->name }}</h5>
                                    <p class="card-text">{{ $product->description }}</p>
                                    <p class="h4 text-primary">{{ number_format($product->price, 0, ',', ' ') }} FCFA</p>
                                    <p class="text-muted">Stock disponible : {{ $product->stock }}</p>
                                    
                                    <form class="add-to-cart-form" 
                                          action="{{ route('cart.add') }}" 
                                          method="POST">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        
                                        <div class="input-group">
                                            <input type="number" 
                                                   name="quantity" 
                                                   value="1" 
                                                   min="1" 
                                                   max="{{ $product->stock }}"
                                                   class="form-control"
                                                   style="width: 80px;">
                                            <button type="submit" 
                                                    class="btn btn-outline-primary">
                                                <i class="fas fa-cart-plus"></i> Ajouter
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    
                    <div class="d-flex justify-content-center mt-4">
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
document.querySelectorAll('.add-to-cart-form').forEach(form => {
    form.addEventListener('submit', async (e) => {
        e.preventDefault();
        
        const response = await fetch(form.action, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                product_id: form.querySelector('input[name="product_id"]').value,
                quantity: form.querySelector('input[name="quantity"]').value
            })
        });

        const data = await response.json();
        if(data.success) {
            // Mise à jour du compteur panier
            document.querySelectorAll('.cart-count').forEach(span => {
                span.textContent = data.cart_count;
            });
            
            // Notification toast
            Swal.fire({
                icon: 'success',
                title: 'Produit ajouté au panier !',
                showConfirmButton: false,
                timer: 3000,
                position: 'top-end'
            });
    });
});
</script>
@endpush
@endsection