@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>{{ $categorie->nom }}</h1>
        <p>{{ $categorie->description }}</p>
        <a href="{{ route('categories.index') }}" class="btn btn-secondary">Retour</a>
    </div>
@endsection
