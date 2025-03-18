<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Mail;
use App\Mail\OrderReadyMail;
use Barryvdh\DomPDF\Facade\Pdf;

class OrderController extends Controller
{
    
    public function index()
    {
        // Vérification si l'utilisateur est un manager
        if (Auth::user()->role !== 'manager') {
            abort(403);
        }

        $orders = Order::with(['user', 'products'])->latest()->paginate(10);
        return view('orders.index', compact('orders'));
    }

    public function commandes()
    {
         // Récupérer l'utilisateur connecté
         $user = Auth::user();

         // Récupérer les commandes de l'utilisateur
         $orders = Order::where('user_id', $user->id)
             ->orderBy('created_at', 'desc')
             ->paginate(10);
 
        //  return view('orders.client-orders', compact('orders'));
        return view('orders.index', compact('orders'));
    }

    public function show($id)
    {
        // if (Auth::user()->role !== 'manager') {
        //     abort(403);
        // }

        $order = Order::findOrFail($id); // Charge la commande ou retourne une 404

        return view('orders.show', compact('order'));
    }

    public function updateStatus(Request $request, Order $order)
    {
        if (Auth::user()->role !== 'manager') {
            abort(403);
        }

        $request->validate([
            'status' => 'required|in:pending,preparing,ready,paid'
        ]);
        
        $order->update(['status' => $request->status]);
        if ($order->status == 'ready') {

            $pdf = Pdf::loadView('emails.order-invoice', compact('order'));
            Mail::to($order->user->email)->send(new OrderReadyMail($order, $pdf));
        }

        return back()->with('success', 'Statut mis à jour avec succès.');
    }


    public function create()
    {
        $products = Product::where('stock', '>', 0)->get();
        return view('orders.create', compact('products'));
    }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'products' => 'required|array|min:1',
    //         'products.*.id' => 'required|exists:products,id',
    //         'products.*.quantity' => 'required|integer|min:1'
    //     ]);

    //     try {
    //         DB::beginTransaction();

    //         $order = Auth::user()->orders()->create([
    //             'status' => 'pending',
    //             'total_amount' => 0
    //         ]);

    //         $total = 0;

    //         foreach ($request->products as $item) {
    //             $product = Product::find($item['id']);
                
    //             if ($product->stock < $item['quantity']) {
    //                 throw new \Exception("Stock insuffisant pour {$product->name}");
    //             }

    //             $order->products()->attach($product->id, [
    //                 'quantity' => $item['quantity']
    //             ]);

    //             $product->stock -= $item['quantity'];
    //             $product->save();
                
    //             $total += $product->price * $item['quantity'];
    //         }

    //         $order->total_amount = $total;
    //         $order->save();

    //         DB::commit();

    //         return redirect()->route('orders.show', $order)
    //             ->with('success', 'Commande créée avec succès');

    //     } catch (\Exception $e) {
    //         DB::rollBack();
    //         return back()->withErrors($e->getMessage());
    //     }
    // }

   
}