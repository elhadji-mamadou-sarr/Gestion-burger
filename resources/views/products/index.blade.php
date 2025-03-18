@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Gestion des Produits</h1>

        <div class="col-md-12">
            <a href="{{ route('products.create') }}" class="btn btn-primary mb-3 ">
                Nouveau Produit
            </a>

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
                                    <th>Stock</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td><img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="img-fluid" style="width: 70px; height: 70px;"></td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ number_format($product->price, 2, ',', ' ') }} €</td>
                                        <td>{{ $product->stock }}</td>
                                        <td>
                                            <a href="{{ route('products.show', $product) }}" class="btn btn-sm btn-outline-light">
                                                <i class="flaticon-medical" style="font-size: 20px;"></i>
                                            </a>
                                            <a href="{{ route('products.edit', $product) }}" class="btn btn-sm btn-outline-warning">
                                                <i class="flaticon-pencil" style="font-size: 20px;"></i>
                                            </a>
                                            <form action="{{ route('products.destroy', $product) }}" method="POST"
                                                style="display:inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger">
                                                    <i class="flaticon-interface-5" style="font-size: 20px;"></i>
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
