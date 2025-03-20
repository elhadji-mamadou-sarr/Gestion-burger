<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // Date du jour
        $today = Carbon::today();

        // Commandes en cours de la journée : statuts non validés
        $ongoingOrders = Order::whereDate('created_at', $today)
                        ->whereIn('status', ['pending', 'preparing', 'ready'])
                        ->count();

        // Commandes validées de la journée
        $validatedOrders = Order::whereDate('created_at', $today)
                        ->where('status', 'paid')
                        ->count();

        // Recettes journalières : somme des montants de paiement enregistrés aujourd'hui
        $dailyRevenue = Payment::whereDate('payment_date', $today)
                        ->sum('amount');

        // Nombre de commandes par mois pour l'année en cours
        $ordersPerMonth = Order::select(DB::raw('MONTH(created_at) as month'), DB::raw('count(*) as count'))
                            ->whereYear('created_at', now()->year)
                            ->groupBy('month')
                            ->orderBy('month')
                            ->get();

        // Nombre de produits vendus par catégorie par mois pour l'année en cours
        $productsByCategory = DB::table('order_products')
                            ->join('orders', 'order_products.order_id', '=', 'orders.id')
                            ->join('products', 'order_products.product_id', '=', 'products.id')
                            ->join('categories', 'products.categorie_id', '=', 'categories.id')
                            ->select(
                                DB::raw('MONTH(orders.created_at) as month'),
                                'categories.nom as category',
                                DB::raw('SUM(order_products.quantity) as total')
                            )
                            ->whereYear('orders.created_at', now()->year)
                            ->groupBy('month', 'categories.nom')
                            ->orderBy('month')
                            ->get();

        // Passage des données à la vue
        return view('dashboard', compact(
            'ongoingOrders',
            'validatedOrders',
            'dailyRevenue',
            'ordersPerMonth',
            'productsByCategory'
        ));
    }
}
