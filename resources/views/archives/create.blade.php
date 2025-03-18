@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="col-md-12">
        <div class="card">
        <div class="card-header">
            <div class="card-title">Ajouter un burger</div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12 col-lg-12">
                <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name" class="form-label">Nom du produit</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
            
                    <div class="form-group">
                        <label for="price" class="form-label">Prix</label>
                        <input type="number" step="0.01" class="form-control" id="price" name="price" required>
                    </div>
            
                    <div class="form-group">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                    </div>
            
                    <div class="form-group">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" class="form-control" id="image" name="image">
                    </div>
            
                    <div class="form-group">
                        <label for="stock" class="form-label">Stock</label>
                        <input type="number" class="form-control" id="stock" name="stock" required>
                    </div>
                    <div class="card-action">
                        <button class="btn btn-success" type="submit">Submit</button>
                    </div>
                </form>
                </div>
            </div>

    </div>
</div>
    
@endsection