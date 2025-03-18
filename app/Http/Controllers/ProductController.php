<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
     /** Affichage de la page d'accueil */
     public function welcome(){
        $products = Product::paginate(8);
        return view('welcome', compact('products'));
     }
     /**
      * Undocumented function
      *Affichage du menu
      */
      public function menu(){
        $products = Product::paginate(10);
        return view('menu', compact('products'));
     }
    /**
     * Affiche la liste des produits
     */
    public function index()
    {
        $products = Product::latest()->paginate(10);
        return view('products.index', compact('products'));
    }

    public function clientCatalog()
    {
        $products = Product::available()->paginate(10);
        return view('products.catalogue', compact('products'));
    }
    /**
     * Affiche le formulaire de création
     */
    public function create()
    {
        $product = new Product();
        return view('products.create', compact('product'));
    }

    /**
     * Enregistre un nouveau produit
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'price' => 'required|numeric|min:0',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'stock' => 'required|integer|min:0',
        ]);

        $imagePath = $request->hasFile('image') 
            ? $request->file('image')->store('products', 'public') 
            : null;

        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'image' => $imagePath,
            'stock' => $request->stock,
            'is_available' => $request->stock > 0,
        ]);

        return redirect()->route('products.index')
            ->with('success', 'Burger ajouté avec succès');
    }

    /**
     * Affiche les détails d'un produit
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Affiche le formulaire d'édition
     */
    public function edit(Product $product)
    {
        return view('products.create', compact('product'));
    }

    /**
     * Met à jour le produit
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'price' => 'required|numeric|min:0',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'stock' => 'required|integer|min:0',
        ]);

        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $imagePath = $request->file('image')->store('products', 'public');
            $product->image = $imagePath;
        }

        $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'stock' => $request->stock,
            'is_available' => $request->stock > 0,
        ]);

        return redirect()->route('products.index')
            ->with('success', 'Produit mis à jour avec succès');
    }

    /**
     * Supprime le produit
     */
    public function destroy(Product $product)
    {
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }
        
        $product->delete();
        return redirect()->route('products.index')
            ->with('success', 'Produit supprimé avec succès');
    }

    /**
     * Archive le produit
     */
    public function archive(Product $product)
    {
        $product->update(['is_available' => false]);
        return redirect()->back()
            ->with('success', 'Produit archivé avec succès');
    }

    /**
     * Restaure le produit
     */
    public function restore(Product $product)
    {
        $product->update(['is_available' => true]);
        return redirect()->back()
            ->with('success', 'Produit restauré avec succès');
    }
}