<!-- NAVBAR -->
<nav class="navbar bg-light px-3 py-3 mb-5">
  <div class="d-flex align-items-center w-100">
    <!-- Nom de l'école -->
    <h3 class="mb-0 me-5 flex-shrink-0"><strong>{{ auth()->user()->nom }}</strong></h3>

    <!-- Zone de recherche -->
    <div class="d-flex flex-grow-1 align-items-center">
      <input type="text" 
             class="form-control border-10 bg-light" 
             placeholder="Rechercher...">
      <button class="btn btn-light border-start-0" 
              data-bs-toggle="offcanvas" 
              data-bs-target="#mobileMenu">
        <i class="fas fa-search text-muted"></i>
      </button>
    </div>

    <!-- Icône  -->
    <div class="d-flex align-items-center gap-2 px-3">
      <i class="fas fa-user-circle fa-2x"></i>
      <span class="text-muted small">{{ auth()->user()->nom }}</span>
    </div>

    
  </div>
</nav>
