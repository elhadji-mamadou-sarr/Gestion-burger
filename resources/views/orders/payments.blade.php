@extends('layouts.admin')

@section('content')
    <div class="container">
        
        <div class="col-md-12">
            
            <div class="d-flex justify-content-between">
                
                <h3>Paiments de commande</h3>
              
            </div>

            <div class="card">
                
                <div class="card-header">
                    <h4 class="card-title"></h4> 
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="basic-datatables" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Nº commande</th>
                                    <th>Client</th>
                                    <th>Montant</th>
                                    <th>Date Paiemant</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($payments as $payment)
                                    <tr>
                                        <td>{{ $payment->order_id }}</td>
                                        <td>{{ $payment->order->user->nom }} {{ $payment->order->user->prenom }}</td>
                                        <td>{{ number_format($payment->amount, 2, ',', ' ') }} FCFA</td>
                                        <td>{{ $payment->payment_date->format('d/m/Y H:i') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        {{ $payments->links() }}
    </div>
@endsection
