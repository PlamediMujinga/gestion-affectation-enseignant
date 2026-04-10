<!-- SIDEBAR DESKTOP -->
<div class="sidebar d-none d-md-block">

    <a href="/proved/dashboard"> <i class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
    <a href="/proved/ecoles/index"> <i class="fas fa-solid fa-school me-2"></i>Ecoles</a>
    <a href="/proved/enseignants/index"> <i class="fas fa-chalkboard-user me-2"></i>Enseignants</a>
    <a href="/proved/affectations/index"> <i class="fas fa-file-signature me-2"></i>Affectations</a>
    <a href="/proved/mutations/index"> <i class="fas fa-solid fa-right-left me-2"></i>Mutations</a>
    <a href="/proved/divisions/index"> <i class="fas fa-solid fa-sitemap me-2"></i>Divisions</a>
    <a href="/proved/statistiques/index"> <i class="fas fa-solid fa-chart-line me-2"></i>Statistiques</a>
    <a href="/proved/notifications/index"> <i class="fas fa-solid fa-bell me-2"></i>Notifications</a>


    
    <form id="logout-form" action="{{ route('logout') }}" method="POST">
        @csrf
        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" > 
            <i class="fas fa-sign-out-alt me-2"></i>Déconnexion</a>
    </form>
   
</div>

<!-- SIDEBAR MOBILE -->
<div class="offcanvas offcanvas-start" id="mobilmenu">
    <div class="offcanvas-header">
        <h5>Menu</h5>
        <button class="btn-close" data-bs-dismiss="offcanvas"></button>
    </div>

    <div class="offcanvas-body">
        <a href="/proved/dashboard" class="d-block mb-2">Dashboard</a>
        <a href="/proved/ecoles/index" class="d-block mb-2">Ecoles</a>
        <a href="/proved/affectations/index" class="d-block mb-2">affectations</a>
        <a href="/proved/mutations/index" class="d-block mb-2">Mutations</a>
        <a href="/proved/divions/index" class="d-block mb-2">Divisions</a>
        <a href="/proved/statistiques/index" class="d-block mb-2">Statistiques</a>
        <a href="/proved/notifications/index" class="d-block mb-2">Notifications</a>

        <a href="/login" class="d-block mb-2">Déconnexion</a>
        
    </div>
</div>