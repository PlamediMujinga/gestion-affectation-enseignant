@extends('layouts.proved')

@section('content')

<h2 class="mb-4">Statistiques</h2>

<!-- CARTES -->
<div class="row mb-4">
    <div class="col-md-4">
        <div class="card-box bg-success">
            <h4>1850</h4>
            <p>Enseignants</p>
        </div>
    </div>

    <div class="col-md-4">
        <div class="stat-card orange">
            <h4>220</h4>
            <p>Total Écoles</p>
        </div>
    </div>

    <div class="col-md-4">
        <div class="stat-card blue">
            <h4>120</h4>
            <p>Total Affectations</p>
        </div>
    </div>
</div>

<!-- GRAPHIQUES -->
<div class="row">
    
    <!-- BAR CHART -->
    <div class="col-md-6">
        <div class="card p-3 shadow-sm">
            <h5>Enseignants par École</h5>
            <canvas id="barChart"></canvas>
        </div>
    </div>

    <!-- PIE CHART -->
    <div class="col-md-6">
        <div class="card p-3 shadow-sm">
            <h5>Affectations par Mois</h5>
            <canvas id="pieChart"></canvas>
        </div>
    </div>

</div>

    <!-- CHART JS -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        

        // PIE CHART (données fictives)
        const pieCtx = document.getElementById('pieChart');

        new Chart(pieCtx, {
            type: 'doughnut',
            data: {
                labels: ['Jan', 'Fév', 'Mar', 'Avr', 'Mai'],
                datasets: [{
                    data: [10, 20, 15, 30, 25]
                }]
            }
        });
    </script>

@endsection