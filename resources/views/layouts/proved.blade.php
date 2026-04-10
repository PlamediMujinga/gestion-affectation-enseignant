<!DOCTYPE html>
<html lang="fr">
    <!-- HEADER -->
<div class="header d-flex justify-content-between align-items-center px-4 py-2 bg-white shadow-sm">

    <!-- TITRE PAGE -->
    <div>
        <h5 class="mb-0">PROVED</h5>
    </div>

    <!-- DROITE -->
    <div class="d-flex align-items-center gap-3">

        <!-- SEARCH -->
        <input type="text" class="form-control" placeholder="Rechercher..." style="width:200px;">
        <button class="btn btn-light border-start-0" data-bs-toggle="offcanvas" data-bs-target="#mobileMenu"><i class="fas fa-search text-muted"></i></button>
    

        <!-- NOTIFICATION -->
        <div class="position-relative">
            <i class="fa fa-bell fs-5"></i>
            <span class="badge bg-danger position-absolute top-0 start-100 translate-middle">3</span>
        </div>

        <!-- USER -->
        <div class="d-flex align-items-center">
            <img src="https://i.pravatar.cc/40" class="rounded-circle me-2">
            <span>{{ auth()->user()->name ?? 'Admin' }}</span>
        </div>

    </div>

</div>
<head>
    <meta charset="UTF-8">
    <title> Portail Proved</title> 

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Icons -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
        <!-- Font -->
        <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
        
      
        <!-- CSS -->
        <link rel="stylesheet" href="{{ asset('assets/css/proved.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
        <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
   
</head>

<body>


    @include('components.sidebar_proved')

        <div class="content">
            

            @include('components.alerts')

            @yield('content')

        </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

</body>
</html>
    
        
    </body>
</html>