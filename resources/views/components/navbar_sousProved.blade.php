<!-- NAVBAR -->
<div class="topbar d-flex justify-content-between align-items-center mb-4">
    <h3 class="mb-0 me-5 flex-shrink-0"><strong>{{ auth()->user()->nom }}</strong></h3>

    <input type="text" class="form-control w-50" placeholder="Rechercher...">
    <div>
        <i class="fa fa-bell me-3"></i><strong>{{ auth()->user()->nom }}</strong>
    </div>
</div>