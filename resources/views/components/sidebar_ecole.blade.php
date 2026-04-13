<!-- SIDEBAR DESKTOP -->
<div class="sidebar d-none d-md-block">
    <h4 class="mb-4"><i class="fas fa-bank fa-lg"></i>  Ecole</h4>

    <a href="/ecole/dashboard"> <i class="fas fa-tachometer me-2"></i>Dashboard</a>
    <a href="/ecole/enseignants/index"> <i class="fas fa-user-friends me-2"></i>Enseignants</a>
    <a href="/ecole/demandes/index"> <i class="fas fa-file-import me-2"></i>Demandes</a>
    <a href="/ecole/affectations/index"> <i class="fas fa-file-signature me-2"></i>Affectations</a>
    <a href="/ecole/profil"> <i class="fas fa-user-circle me-2"></i>Profil</a>
    
    <form id="logout-form" action="{{ route('logout') }}" method="POST">
        @csrf
        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" > 
            <i class="fas fa-sign-out me-2"></i>Déconnexion</a>
    </form>
   
</div>

<!-- SIDEBAR MOBILE -->
<div class="offcanvas offcanvas-start" id="mobilmenu">
    <div class="offcanvas-header">
        <h5>Menu</h5>
        <button class="btn-close" data-bs-dismiss="offcanvas"></button>
    </div>

    <div class="offcanvas-body">
        <a href="/ecole/dashboard" class="d-block mb-2">Dashboard</a>
        <a href="/ecole/enseignant/index" class="d-block mb-2">Enseignants</a>
        <a href="/ecole/demandes/index" class="d-block mb-2">Demandes</a>
        <a href="/ecole/affectations/index" class="d-block mb-2">Affectations</a>
        <a href="/ecole/profil" class="d-block mb-2">Profil</a>
        <a href="/login" class="d-block mb-2">Déconnexion</a>
        
    </div>
</div>