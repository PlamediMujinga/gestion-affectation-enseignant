<?php

use Illuminate\Support\Facades\Route;

//ROUTES PUBLIQUES

//Connexion
Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

//Enregistrement
Route::get('/register', [RegisterController::class, 'showRegister']);
Route::post('/register', [RegisterController::class, 'register']);

//Deconnexion
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth');

//ROUTES PROTEGEES

Route::middleware(['auth'])->group(function ()
{
    //Enseignant
    Route::prefix('enseignant')
        ->middleware(['role::enseignant'])
        ->group(function () {
            Route::get('/dashboard', [EnseignantDashboard::class, 'index']);

            Route::post('/demandes', [EnseignantDemande::class, 'store'])->middleware('permission:create_demande');
        });

    //Ecole
    Route::prefix('ecole')
        ->middleware(['role::ecole'])
        ->group(function () {
            Route::get('/dashboard', [EcoleDashboard::class, 'index']);

            Route::post('/demandes', [EcoleDemande::class, 'store'])->middleware('permission:create_demande');
        });

    //Sous Proved
    Route::prefix('sous-proved')
        ->middleware(['role::sous_proved'])
        ->group(function () {
            Route::get('/dashboard', [SousProvedDashboard::class, 'index']);

            Route::get('/ecoles', [SousProvedEcole::class, 'index'])->middleware('permission:view_ecole');

            Route::get('/demandes', [SousProvedDemande::class, 'index'])->middleware('permission:view_demande');

            Route::post('/affectations', [AffectionController::class, 'store'])->middleware('permission:affect_teacher');
        });

    //Proved
    Route::prefix('proved')
        ->middleware(['role::proved'])
        ->group(function () {
            Route::get('/dashboard', [ProvedDashboard::class, 'index']);

            Route::get('/ecoles', [ProvedEcole::class, 'index'])->middleware('permission:view_ecole');

            Route::get('/demandes', [ProvedDemande::class, 'index'])->middleware('permission:view_demande');

            Route::post('/affectations', [AffectionController::class, 'store'])->middleware('permission:affect_teacher');
        });
});
