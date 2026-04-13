<?php

use Illuminate\Support\Facades\Route;

//Authentification
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

//Admin
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;

//Enseignant
use App\Http\Controllers\Enseignant\EnseignantController;

//Ecole
use App\Http\Controllers\Ecole\EcoleController;

//Sous Proved
use App\Http\Controllers\SousProved\SousProvedController;

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
            Route::get('/dashboard', [EnseignantController::class, 'index']);

            Route::get('/profil', [EnseignantController::class, 'profil']);

            Route::get('/demandes/index', [EnseignantController::class, 'historicDemande'])->name('demandes.index');

            Route::get('/demandes/create', [EnseignantController::class, 'createDemande'])->name('demandes.create');

            Route::get('/affectations/index', [EnseignantController::class, 'historicAffectation'])->name('affectations.enseignant.index');

            Route::post('/demandes/create', [EnseignantController::class, 'storeDemande'])->middleware('permission:create_demande')->name('demandes.store');
        });

    //Ecole
    Route::prefix('ecole')
        ->middleware(['role:ecole'])
        ->group(function () {
            Route::get('/dashboard', [EcoleController::class, 'index']);

            Route::get('/profil', [EcoleController::class, 'profil']);

            Route::get('/demandes/index', [EcoleController::class, 'historicDemande'])->name('demandes.ecole.index');

            Route::get('/demandes/create', [EcoleController::class, 'createDemande'])->name('demandes.ecole.create');

            Route::get('/enseignants/index', [EcoleController::class, 'listeEnseignant'])->name('enseignant.index');

            Route::get('/enseignants/poste', [EcoleController::class, 'posteVacant'])->name('enseignant.poste');

            Route::get('/affectations/index', [EcoleController::class, 'historicAffectation'])->name('affectations.ecole.index');

            Route::post('/demandes/create', [EcoleController::class, 'storeDemande'])->middleware('permission:create_demande')->name('demandes.ecole.store');
        });

    //Sous Proved
    Route::prefix('sousProved')
        ->middleware(['role:sous_proved'])
        ->group(function () {
            Route::get('/dashboard', [SousProvedController::class, 'index'])->name('sousProved.dashboard');

            Route::get('/ecoles', [SousProvedController::class, 'index'])->middleware('permission:view_ecole');

            Route::get('/demandes', [SousProvedController::class, 'index'])->middleware('permission:view_demande');

            Route::post('/affectations', [SousProvedController::class, 'store'])->middleware('permission:affect_teacher');
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
