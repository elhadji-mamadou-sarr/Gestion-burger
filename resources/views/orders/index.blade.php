@extends('layouts.admin')

@section('title','Liste des commandes' )

@section('content')
    <div class="container">
        <h1>Gestion des Commandes</h1>

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Liste des commandes</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="basic-datatables" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Utilisateur</th>
                                    <th>Montant Total</th>
                                    <th>Statut</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>{{ $order->id }}</td>
                                        <td>{{ $order->user->nom }} {{ $order->user->prenom }}</td>
                                        <td>{{ number_format($order->total_amount, 2, ',', ' ') }} €</td>
                                        <td>
                                            <span class="badge 
                                                @if($order->status == 'pending') 
                                                    badge-warning 
                                                @elseif($order->status == 'preparing') 
                                                    badge-primary 
                                                @elseif($order->status == 'ready') 
                                                    badge-success 
                                                @elseif($order->status == 'paid') 
                                                    badge-info 
                                                @endif
                                            ">
                                                {{ App\Models\Order::STATUSES[$order->status] }}
                                            </span>
                                        </td>
                                        <td class="text-right">
                                            <a href="{{ route('commandes.show', $order) }}" class="btn btn-sm btn-outline-info">
                                                Voir
                                            </a>
                                            @if (Auth::user()->role == 'manager')
                                                <form action="{{ route('commandes.updateStatus', $order) }}" method="POST" style="display:inline">
                                                    @csrf
                                                    {{-- @method('PUT') --}}
                                                    <select name="status" class="form-control d-inline w-auto" onchange="this.form.submit()">
                                                        @foreach(App\Models\Order::STATUSES as $key => $label)
                                                            <option value="{{ $key }}" {{ $order->status == $key ? 'selected' : '' }}>{{ $label }}</option>
                                                        @endforeach
                                                    </select>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        {{ $orders->links() }}
    </div>
@endsection
