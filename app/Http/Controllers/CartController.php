<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1'
        ]);

        $cart = Session::get('cart', []);
        $productId = $request->product_id;

        if (isset($cart[$productId])) {
            $cart[$productId] += $request->quantity;
        } else {
            $cart[$productId] = $request->quantity;
        }

        Session::put('cart', $cart);

        return redirect()->back()->with('success', 'Produit ajouté au panier !');
    }
    public function addToCartMenu(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1'
        ]);

        $cart = Session::get('cart', []);
        $productId = $request->product_id;

        if (isset($cart[$productId])) {
            $cart[$productId] += $request->quantity;
        } else {
            $cart[$productId] = $request->quantity;
        }

        Session::put('cart', $cart);
    }

    public function show()
    {
        $cart = Session::get('cart', []);
        
        if(empty($cart)) {
            if (Auth::check() && Auth::user()->role === 'client') {
                return redirect()->route('products.catalogue')->with('info', 'Votre panier est vide');
            }
            return redirect()->route('menu')->with('info', 'Votre panier est vide');
        }

        $productIds = array_keys($cart);
        $products = Product::whereIn('id', $productIds)->get()
            ->map(function($product) use ($cart) {
                $product->quantity = $cart[$product->id];
                $product->total = $product->price * $cart[$product->id];
                return $product;
            });

        $totalPanier = $products->sum('total');

        return view('cart.show', [
            'products' => $products,
            'totalPanier' => $totalPanier
        ]);
    }

    public function update(Request $request, $productId)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        $cart = Session::get('cart', []);

        if (isset($cart[$productId])) {
            $cart[$productId] = $request->quantity;
            Session::put('cart', $cart);

            return response()->redirectToroute('cart.show')->with([
                'success' => true,
                'message' => 'Quantité mise à jour'
            ]);
        }

        return response()->redirectToroute('cart.show')->with(['error' => false, 'message' => 'Produit non trouvé dans le panier'], 404);
    }

    public function destroy($productId)
    {
        $cart = Session::get('cart', []);

        if (isset($cart[$productId])) {
            unset($cart[$productId]);
            Session::put('cart', $cart);

            return redirect()->route('cart.show')->with('success', 'Produit supprimé du panier avec succès');
        }

        return response()->redirectToroute('products.catalogue')->with(['success' => false, 'message' => 'Produit non trouvé dans le panier'], 404);
    }
}