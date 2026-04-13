<!-- SIDEBAR DESKTOP -->
<div class="sidebar d-none d-md-block">
    <h4 class="mb-4 px-2"><i class="fas fa-user fa-lg"></i> Enseignant</h4>

    <a href="/enseignant/dashboard"> <i class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
    <a href="/enseignant/demandes/index"> <i class="fas fa-file-import me-2"></i>Demandes</a>
    <a href="/enseignant/affectations/index"> <i class="fas fa-file-signature me-2"></i>Affectations</a>
    <a href="/enseignant/profil"> <i class="fas fa-user-circle me-2"></i>Mon Profil</a>
    
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
        <a href="/enseignant/dashboard" class="d-block mb-2">Dashboard</a>
        <a href="/enseignant/demandes/index" class="d-block mb-2">Demandes</a>
        <a href="/enseignant/affectations/index" class="d-block mb-2">Affectations</a>
        <a href="/enseignant/profil" class="d-block mb-2">Profil</a>
        <a href="/login" class="d-block mb-2">Déconnexion</a>
        
    </div>
</div>