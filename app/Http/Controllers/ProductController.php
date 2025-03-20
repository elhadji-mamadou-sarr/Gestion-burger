<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
     /** Affichage de la page d'accueil */
     public function welcome(){
        $products = Product::where('is_available', true)->paginate(8);
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
    /**x
     * Affiche la liste des produits
     */
    public function index()
    {
        $products = Product::where('is_available', true)->paginate(10);
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
        $categories = Categorie::all();
        
        return view('products.create', compact('product', 'categories'));
    }

    /**
     * Enregistre un nouveau produit
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:100',
            'price' => 'required|numeric|min:0',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'stock' => 'required|integer|min:0',
            'categorie_id' => 'required|integer',
        ]);

        $validatedData['image'] = $request->hasFile('image') 
            ? $request->file('image')->store('products', 'public') 
            : null;

        Product::create($validatedData);

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
        $categories = Categorie::all();
        return view('products.create', compact('product', 'categories'));
    }

    /**
     * Met à jour le produit
     */
    public function update(Request $request, Product $product)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:100',
            'price' => 'required|numeric|min:0',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'stock' => 'required|integer|min:0',
            'categorie_id' => 'required|integer',
        ]);

        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $validatedData['image'] = $request->file('image')->store('products', 'public');
        }
        $validatedData['is_available'] = $request->stock > 0;
        $product->update($validatedData);

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
     * Archive le produit
     */
    public function archiveList()
    {
        $products = Product::where('is_available', false)->paginate(10);
        return view('products.archive', compact('products'));
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