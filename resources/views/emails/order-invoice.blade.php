<!DOCTYPE html>
<html>
<head>
    <title>Facture #{{ $order->id }}</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .invoice { width: 100%; max-width: 800px; margin: 0 auto; }
        .header { text-align: center; margin-bottom: 20px; }
        .details { margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #000; padding: 8px; text-align: left; }
        .total { font-weight: bold; }
    </style>
</head>
<body>
    <div class="invoice">
        <div class="header">
            <h1>Facture #{{ $order->id }}</h1>
            <p>Date : {{ $order->created_at->format('d/m/Y') }}</p>
        </div>

        <div class="details">
            <p><strong>Client :</strong> {{ $order->user->nom }}</p>
            <p><strong>Email :</strong> {{ $order->user->email }}</p>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Produit</th>
                    <th>Quantité</th>
                    <th>Prix unitaire</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($order->products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->pivot->quantity }}</td>
                        <td>{{ number_format($product->price, 2) }} F</td>
                        <td>{{ number_format($product->price * $product->pivot->quantity, 2) }} F</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3" class="total">Total</td>
                    <td class="total">{{ number_format($order->total_amount, 2) }} F</td>
                </tr>
            </tfoot>
        </table>
    </div>
</body>
</html>