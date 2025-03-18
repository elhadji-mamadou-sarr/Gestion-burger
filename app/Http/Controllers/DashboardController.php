<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // Commandes en cours de la journée
        $commandesEnCours = Order::whereDate('created_at', today())
            ->whereIn('status', ['pending', 'preparing'])
            ->count();

        // Commandes validées de la journée
        $commandesValidees = Order::whereDate('created_at', today())
            ->where('status', 'paid')
            ->count();

        // Recettes journalières
        $recettesJournalieres = Order::whereDate('created_at', today())
            ->where('status', 'paid')
            ->sum('total_amount');

        // Nombre de commandes par mois
        $commandesParMois = Order::selectRaw('YEAR(created_at) as year, MONTH(created_at) as month, COUNT(*) as total')
            ->groupBy('year', 'month')
            ->orderBy('year', 'asc')
            ->orderBy('month', 'asc')
            ->get()
            ->map(function ($item) {
                return [
                    'label' => Carbon::create($item->year, $item->month)->format('M Y'),
                    'total' => $item->total,
                ];
            });

            $produitsParProduitParMois = DB::table('order_products')
            ->join('products', 'order_products.product_id', '=', 'products.id')
            ->selectRaw('YEAR(order_products.created_at) as year, MONTH(order_products.created_at) as month, products.id as product_id, SUM(order_products.quantity) as total')
            ->groupBy('year', 'month', 'product_id')
            ->orderBy('year', 'asc')
            ->orderBy('month', 'asc')
            ->get()
            ->map(function ($item) {
                return (object) [ // Convertir en objet pour éviter l'erreur
                    'label' => Carbon::create($item->year, $item->month)->format('M Y'),
                    'product_id' => $item->product_id,
                    'total' => $item->total,
                ];
            });

        return view('dashboard', compact(
            'commandesEnCours',
            'commandesValidees',
            'recettesJournalieres',
            'commandesParMois',
            'produitsParProduitParMois'
        ));
    }
}