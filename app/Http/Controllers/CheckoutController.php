<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    /**
     * Affiche la page de checkout
     */
    public function show()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Vous devez être connecté pour Valider votre commande. Veuillez créer un compte ou vous connecter.');
        }

        $cart = Session::get('cart', []);
        
        if(empty($cart)) {
            return redirect()->route('menu')->with('error', 'Votre panier est vide');
        }

        $products = Product::whereIn('id', array_keys($cart))->get()
            ->map(function($product) use ($cart) {
                $product->quantity = $cart[$product->id];
                return $product;
            });

        return view('checkout.show', [
            'products' => $products,
            'total' => $this->calculateTotal($products, $cart)
        ]);
    }

    /**
     * Traite la commande
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'telephone' => 'required|string|max:20',
            'addresse' => 'required|string|max:255',
        ]);

        $cart = Session::get('cart', []);
        
        // Vérification finale du stock
        foreach ($cart as $productId => $quantity) {
            $product = Product::findOrFail($productId);
            if($product->stock < $quantity) {
                return redirect()->back()->withErrors([
                    'stock' => "Stock insuffisant pour {$product->name} (reste {$product->stock})"
                ]);
            }
        }
        // Création de la commande
        $order = Order::create([
            'user_id' => Auth::id(),
            'status' => 'pending',
            'total_amount' => $this->calculateTotal(),
            'customer_info' => json_encode($request->only('nom','prenom', 'telephone', 'addresse'))
        ]);

        // Ajout des produits
        foreach ($cart as $productId => $quantity) {
            $product = Product::find($productId);
            
            $order->products()->attach($productId, [
                'quantity' => $quantity
            ]);

            $product->decrement('stock', $quantity);
            $product->update(['is_available' => $product->stock > 0]);
        }

        Session::forget('cart');

        return redirect()->route('commandes.show', $order)
            ->with('success', 'Commande validée avec succès!');
    }

    private function calculateTotal($products = null, $cart = null)    
    {
        $cart = Session::get('cart', []);
        return Product::whereIn('id', array_keys($cart))
            ->get()
            ->sum(function($product) use ($cart) {
                return $product->price * $cart[$product->id];
            });
    }
}