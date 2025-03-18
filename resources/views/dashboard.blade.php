@extends('layouts.admin')

@section('content')
<div class="mt-2 mb-4">
    <h2 class="text-white pb-2">Heureux de vous revoir {{ Auth::user()->prenom }} {{ Auth::user()->nom }}</h2>
</div>


<div class="row">
    <div class="col-md-4">
        <div class="card card-dark bg-primary-gradient">
            <div class="card-body pb-0">
                <h2 class="mb-2">{{ $commandesEnCours }}</h2>
                <p>Commandes en cours</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card card-dark bg-secondary-gradient">
            <div class="card-body pb-0">
                <h2 class="mb-2">{{ $commandesValidees }}</h2>
                <p>Commandes validées</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card card-dark bg-success2">
            <div class="card-body pb-0">
                <h2 class="mb-2">{{ number_format($recettesJournalieres, 2) }} F</h2>
                <p>Recettes journalières</p>
            </div>
        </div>
    </div>
</div>


<div class="row">

    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Statistiques des commandes</div>
            </div>
            <div class="card-body">
                <div class="chart-container" style="min-height: 375px">
                    <canvas id="statisticsChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card card-secondary">
            <div class="card-header">
                <div class="card-title">Produits par produit (quantité totale)</div>
            </div>
            <div class="card-body pb-0">
                <div class="pull-in">
                    <canvas id="produitsChart"></canvas>
                </div>
            </div>
        </div>
    </div>

</div>


<script>
    var ctx = document.getElementById('statisticsChart').getContext('2d');
    var statisticsChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: @json($commandesParMois->pluck('label')),
            datasets: [{
                label: 'Commandes',
                borderColor: '#f3545d',
                pointBackgroundColor: 'rgba(243, 84, 93, 0.6)',
                pointRadius: 0,
                backgroundColor: 'rgba(243, 84, 93, 0.4)',
                fill: true,
                borderWidth: 2,
                data: @json($commandesParMois->pluck('total')),
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            legend: {
                display: false
            },
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>
<script>
    var produitsCtx = document.getElementById('produitsChart').getContext('2d');
    var produitsChart = new Chart(produitsCtx, {
        type: 'bar',
        data: {
            labels: @json($produitsParProduitParMois->pluck('label')), // Mois/Année
            datasets: [
                @foreach($produitsParProduitParMois as $produit)
                {
                    label: 'Produit #{{ $produit->product_id }}', // Identifiant du produit ou autre
                    backgroundColor: 'rgba({{ rand(0, 255) }}, {{ rand(0, 255) }}, {{ rand(0, 255) }}, 0.6)', // Couleur aléatoire
                    borderColor: 'rgba({{ rand(0, 255) }}, {{ rand(0, 255) }}, {{ rand(0, 255) }}, 1)',
                    borderWidth: 1,
                    data: @json([$produit->total]), // Quantité de chaque produit
                },
                @endforeach
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>
@endsection