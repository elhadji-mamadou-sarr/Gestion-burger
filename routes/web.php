<?php

use App\Events\OrderReady;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Mail\OrderReadyMail;
use Illuminate\Support\Facades\Route;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Mail;

Route::get('/test-pdf', function () {
    $order = \App\Models\Order::find(1); // Remplacez par une commande existante
    $pdf = Pdf::loadView('emails.order-invoice', compact('order'));
    Mail::to($order->user->email)->send(new OrderReadyMail($order, $pdf));

    return $pdf->stream('facture.pdf'); // Affiche le PDF dans le navigateur
});

Route::get('/',[ProductController::class, 'welcome'])->name('welcome');
Route::get('/menu',[ProductController::class, 'menu'])->name('menu');


Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//les produits
Route::middleware('auth')->group(function () {
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::resource('products', ProductController::class)->except(['clientCatalog', 'show']);
    
    Route::put('/products/{product}/restore', [ProductController::class, 'restore'])->name('products.restore');
    Route::put('/products/{product}/archive', [ProductController::class, 'archive'])->name('products.archive');
    
    Route::get('/products/archives', [ProductController::class, 'archiveList'])->name('products.archives');
    
    Route::get('commandes/paiements', [OrderController::class, 'payment'])->name('commandes.paiements');
    
    Route::resource('commandes', OrderController::class)->except(['updateStatus', 'store']);
    
    Route::resource('categories', CategorieController::class)->except('destroy');
    Route::delete('/categories/{categorie}/delete', [CategorieController::class, 'destroy'])->name('categories.destroy');
    
    Route::post('/commandes/{order}', [OrderController::class, 'updateStatus'])->name('commandes.updateStatus');
    
});

// Avant le middleware
Route::get('/products/catalogue', [ProductController::class, 'clientCatalog'])
     ->name('products.catalogue');

Route::middleware('auth')->group(function () {
    // Routes réservées aux clients
    Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
  
});

Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
// Modification de quantité
Route::put('/cart/{product}', [CartController::class, 'update'])->name('cart.update');



//cart
Route::post('/cart/add/menu', [CartController::class, 'addToCartMenu'])->name('cart.add.menu');

// Suppression d'article
Route::delete('/cart/{product}', [CartController::class, 'destroy'])->name('cart.remove');

Route::get('/panier', [CartController::class, 'show'])->name('cart.show')->middleware(['auth']);


//checkout
Route::prefix('checkout')->middleware('auth')->group(function () {

    Route::get('/checkout/create', [CheckoutController::class, 'show'])->name('checkout');
    Route::post('/checkout/save', [CheckoutController::class, 'store'])->name('checkout.store');
    Route::put('/checkout/{checkout}', [CheckoutController::class, 'update'])->name('checkout.update');
    Route::delete('/checkout/{checkout}', [CheckoutController::class, 'destroy'])->name('checkout.destroy');

    Route::get('/mes-commandes', [OrderController::class, 'commandes'])->name('commandes.client');
    // Route::get('/mes-commandes/{order}', [OrderController::class, 'commandes'])->name('commandes.client');
});

require __DIR__.'/auth.php';
