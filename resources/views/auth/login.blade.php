<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Connexion</title>

        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Icons -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap.icons.css" rel="stylesheet">
        <!-- Font -->
        <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="{{ asset('assets/css/auth.css') }}">

    </head>
    <body class="d-flex align-items-center justify-content-center">
        
            <div class="auth-card w-100" style="max-width:400px;">
                <h4 class="text-center mb-3">Connexion</h4>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        {{ $errors->first() }}
                    </div>
                @endif

                <form method="POST" action="/login">
                    @csrf 

                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>Mot de passe</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-custom w-100">
                        Se connecter
                    </button>
                </form>

                <div class="text-center mt-3">
                    <small>
                        Pas de compte ?
                    <a href="/register">Créer un compte</a>
                    </small>
                </div>
                
            </div>
        
    </body>
</html>