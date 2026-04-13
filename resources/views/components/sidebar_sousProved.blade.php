<!-- SIDEBAR -->
<div class="sidebar p-3">
    <h4 class="mb-4">Sous-Proved</h4>
    <ul class="nav flex-column">
        <li><a href="#" class="nav-link"><i class="fa fa-gauge-high me-2"></i>Dashboard</a></li>
        <li><a href="#" class="nav-link"><i class="fa fa-school me-2"></i>Ecoles</a></li>
        <li><a href="#" class="nav-link"><i class="fa fa-users me-2"></i>Enseignants</a></li>
        <li><a href="#" class="nav-link"><i class="fa fa-envelope me-2"></i>Demandes</a></li>
        <li><a href="#" class="nav-link"><i class="fa fa-right-left me-2"></i>Affectations</a></li>
        <li><a href="#" class="nav-link"><i class="fa fa-chart-column me-2"></i>Statistiques</a></li>

        <li class="mt-4">
            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
                <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" > 
                    <i class="fa fa-right-from-bracket me-2"></i>Déconnexion
                </a>
            </form>
        </li>
    </ul>
</div>