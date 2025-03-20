@extends('layouts.admin')

@section('content')
    <div class="container">
       
        <div class="card">

            <div class="card-header d-flex justify-content-between">
                <h2>Liste des catégories</h2>
                <a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">Ajouter une catégorie</a>
            </div>

            <div class="card-body">

                <table class="table">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $categorie)
                            <tr>
                                <td>{{ $categorie->nom }}</td>
                                <td class="d-flex justify-content-end ">

                                    <div class="show">
                                        <a href="{{ route('categories.edit', $categorie) }}" class="btn btn-sm btn-outline-primary">
                                            <i class="flaticon-pencil" style="font-size: 20px;"></i>
                                        </a>
                                    </div>
                                    &nbsp;
                                    &nbsp;
                                
                                    <form action="{{ route('categories.destroy', $categorie) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-sm" >
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
@endsection
