@extends('layouts.admin')

@section('content')
    <div class="container">
        
        <div class="col-md-12">
            
            <div class="d-flex justify-content-between">
                
                <h3>Gestion des Produits</h3>
              
            </div>

            <div class="card">
                
                <div class="card-header">
                    <h4 class="card-title">Les burgers</h4> 
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="basic-datatables" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Photo</th>
                                    <th>Nom</th>
                                    <th>Prix</th>
                                    <th>Categorie</th>
                                    <th>Stock</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td><img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="img-fluid" style="width: 70px; height: 70px;"></td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ number_format($product->price, 2, ',', ' ') }} FCFA</td>
                                        <td>{{ $product->categorie->nom ?? 'Non défini' }}</td>
                                        <td>{{ $product->stock }}</td>
                                        <td class="d-flex justify-content-end align-items-center">

                                            <form action="{{ route('products.restore', $product) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="flaticon-archive"></i> Restaurer
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        {{ $products->links() }}
    </div>
@endsection
