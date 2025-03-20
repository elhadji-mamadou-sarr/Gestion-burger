@extends('layouts.admin')

@section('content')
<div class="mt-2 mb-4">
    <h2 class="text-white pb-2">Heureux de vous revoir {{ Auth::user()->prenom }} {{ Auth::user()->nom }}</h2>
</div>

<div class="row">
    <!-- Commandes en cours de la journée -->
    <div class="col-md-4">
        <div class="card card-dark bg-primary-gradient">
            <div class="card-body pb-0">
                <h4 class="text-white">Commandes en cours</h4>
                <h2 class="text-white">{{ $ongoingOrders }}</h2>
            </div>
        </div>
    </div>
    <!-- Commandes validées de la journée -->
    <div class="col-md-4">
        <div class="card card-dark bg-secondary-gradient">
            <div class="card-body pb-0">
                <h4 class="text-white">Commandes validées</h4>
                <h2 class="text-white">{{ $validatedOrders }}</h2>
            </div>
        </div>
    </div>
    <!-- Recettes journalières -->
    <div class="col-md-4">
        <div class="card card-dark bg-success2">
            <div class="card-body pb-0">
                <h4 class="text-white">Recettes journalières</h4>
                <h2 class="text-white">{{ number_format($dailyRevenue, 2, ',', ' ') }} €</h2>
            </div>
        </div>
    </div>
</div>

<div class="row mt-4">
    <!-- Graphique : Nombre de commandes par mois -->
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Statistiques des commandes</div>
            </div>
            <div class="card-body">
                <div class="chart-container" style="min-height: 375px">
                    <canvas id="statisticsChartBurger"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Graphique : Nombre de produits par catégorie par mois -->
    <div class="col-md-4">
        <div class="card card-secondary">
            <div class="card-header">
                <div class="card-title">Produits par catégorie</div>
            </div>
            <div class="card-body pb-0">
                <div class="pull-in">
                    <canvas id="produitsChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

@php
    // Préparation des labels pour les mois et initialisation des commandes par mois
    $monthLabels = [];
    $ordersCount = [];
    for ($i = 1; $i <= 12; $i++) {
        $monthLabels[] = DateTime::createFromFormat('!m', $i)->format('F');
        $ordersCount[$i] = 0;
    }
    foreach($ordersPerMonth as $order) {
        $ordersCount[$order->month] = $order->count;
    }
    $ordersCount = array_values($ordersCount);

    // Préparation des données pour le graphique des produits par catégorie
    $categories = [];
    $dataByMonthCategory = []; // format : [mois => [catégorie => total]]
    foreach($productsByCategory as $item) {
        $dataByMonthCategory[$item->month][$item->category] = $item->total;
        if (!in_array($item->category, $categories)) {
            $categories[] = $item->category;
        }
    }
@endphp
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Graphique : Commandes par mois
    const ctxBurger = document.getElementById('statisticsChartBurger').getContext('2d');
    const statisticsChartBurger = new Chart(ctxBurger, {
        type: 'line',
        data: {
            labels: @json($monthLabels),
            datasets: [{
                label: 'Commandes',
                data: @json($ordersCount),
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 2,
                fill: true
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: { beginAtZero: true }
            }
        }
    });

    // Graphique : Produits par catégorie par mois
    const produitsCtx = document.getElementById('produitsChart').getContext('2d');
    const categories = @json($categories);
    const monthLabels = @json($monthLabels);

    // Création des datasets pour chaque catégorie
    let datasets = categories.map(category => {
        return {
            label: category,
            data: Array(12).fill(0),
            backgroundColor: 'rgba('+ Math.floor(Math.random()*255) +','+ Math.floor(Math.random()*255) +','+ Math.floor(Math.random()*255) +',0.5)',
            borderWidth: 1
        }
    });

    // Remplissage des données par mois et par catégorie
    const dataByMonthCategory = @json($dataByMonthCategory);
    for(let month = 1; month <= 12; month++){
        if(dataByMonthCategory[month]){
            categories.forEach((cat, index) => {
                if(dataByMonthCategory[month][cat]){
                    datasets[index].data[month - 1] = dataByMonthCategory[month][cat];
                }
            });
        }
    }

    const produitsChart = new Chart(produitsCtx, {
        type: 'bar',
        data: {
            labels: monthLabels,
            datasets: datasets
        },
        options: {
            responsive: true,
            scales: {
                y: { beginAtZero: true }
            }
        }
    });
</script>
@endsection
