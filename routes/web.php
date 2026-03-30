<?php

use Illuminate\Support\Facades\Route;

//Authentification
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

//Admin
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;

//Enseignant
use App\Http\Controllers\Enseignant\DashboardController as EnseignantDashboard;
use App\Http\Controllers\Enseignant\DemandeController as EnseignantDemande;

//Ecole
use App\Http\Controllers\Ecole\DashboardController as EcoleDashboard;
use App\Http\Controllers\Ecole\DemandeController as EcoleDemande;

//Sous Proved
use App\Http\Controllers\SousProved\DashboardController as SousProvedDashboard;
use App\Http\Controllers\SousProved\AffectationController;
use App\Http\Controllers\SousProved\DemandeController as SousProvedDemande;
use App\Http\Controllers\SousProved\EcoleController as SousProvedEcole;

//Sous Proved
use App\Http\Controllers\Proved\DashboardController as ProvedDashboard;

Route::get('/', function () {
    return redirect()->route('login');
});
//ROUTES PUBLIQUES

//Connexion
Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

//Enregistrement
Route::get('/register', [RegisterController::class, 'showRegister']);
Route::post('/register', [RegisterController::class, 'register']);

//Deconnexion
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth')->name('logout');

//ROUTES PROTEGEES

Route::middleware(['auth'])->group(function ()
{

    //Admin
    Route::prefix('admin')
        ->middleware(['role:admin'])
        ->group(function () {
            Route::get('/dashboard', [AdminDashboard::class, 'index']);

        });

    //Enseignant
    Route::middleware(['role:enseignant'])
        ->prefix('enseignant')
        ->group(function () {
            Route::get('/dashboard', [EnseignantDashboard::class, 'index']);

            Route::get('/profil', [EnseignantDashboard::class, 'profil']);

            Route::get('/demandes/index', [EnseignantDemande::class, 'index'])->name('demandes.index');

            Route::get('/demandes/create', [EnseignantDemande::class, 'create'])->name('demandes.create');

            Route::post('/demandes/create', [EnseignantDemande::class, 'store'])->middleware('permission:create_demande')->name('demandes.store');
        });

    //Ecole
    Route::prefix('ecole')
        ->middleware(['role:ecole'])
        ->group(function () {
            Route::get('/dashboard', [EcoleDashboard::class, 'index']);

            Route::post('/demandes', [EcoleDemande::class, 'store'])->middleware('permission:create_demande');
        });

    //Sous Proved
    Route::prefix('sous-proved')
        ->middleware(['role:sous_proved'])
        ->group(function () {
            Route::get('/dashboard', [SousProvedDashboard::class, 'index']);

            Route::get('/ecoles', [SousProvedEcole::class, 'index'])->middleware('permission:view_ecole');

            Route::get('/demandes', [SousProvedDemande::class, 'index'])->middleware('permission:view_demande');

            Route::post('/affectations', [AffectionController::class, 'store'])->middleware('permission:affect_teacher');
        });

    //Proved
    Route::prefix('proved')
        ->middleware(['role:proved'])
        ->group(function () {
            Route::get('/dashboard', [ProvedDashboard::class, 'index']);

            /*** 
            Route::get('/ecoles', [ProvedEcole::class, 'index'])->middleware('permission:view_ecole');

            Route::get('/demandes', [ProvedDemande::class, 'index'])->middleware('permission:view_demande');

            Route::post('/affectations', [AffectionController::class, 'store'])->middleware('permission:affect_teacher');
            */
            
        });
});
