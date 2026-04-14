@extends('layouts.proved')

@section('content')

<h3 class="mb-3">Dashboard / {{ auth()->user()->nom }}</h3> <br>

<div class="row g-3">
    <div class="col-12 col-sm-6 col-md-3">
        <div class="stat-card green">
            <p>Total Ecoles</p>
            <h3>120</h3>
        </div>
    </div>

    <div class="col-12 col-sm-6 col-md-3">
        <div class="stat-card orange">
            <p>Total Enseignant</p>
            <h3>450</h3>
        </div>
    </div>

    <div class="col-12 col-sm-6 col-md-3">
        <div class="stat-card blue">
            <p>Postes vacants</p>
            <h3>35</h3>
        </div>
    </div>

    <div class="col-12 col-sm-6 col-md-3">
        <div class="stat-card purple">
            <p>Affectation Récentes</p>
            <h3>15</h3>
        </div>
    </div>
</div>

<!-- Graphiques -->
<div class="custom-card mt-4">
        <div class="chart-box">
            <h4>Évolution des affectations</h4>
            <canvas id="chart1"></canvas>
        </div>

        <div class="chart-box">
            <h4>Carte des écoles</h4>
            <div class="map-placeholder">Carte ici</div>
        </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
const ctx = document.getElementById('chart1');

new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Jan', 'Fev', 'Mar', 'Avr'],
        datasets: [{
            label: 'Affectations',
            data: [10, 20, 15, 25]
        }]
    }
});
</script>

@endsection

