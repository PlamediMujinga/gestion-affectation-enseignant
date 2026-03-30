<?php

namespace App\Http\Controllers\Enseignant;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    
    private function enseignantConnect()
    {
        return auth()->user()->enseignant()->with(['ecole.sousProved.proved.province'])->first();
    }
    
    public function index()
    {
        $enseignant = $this->enseignantConnect();
        return view('enseignant.dashboard', compact('enseignant'));
    }

    public function profil()
    {
        $enseignant = $this->enseignantConnect();
        return view('enseignant.profil', compact('enseignant'));
    }

    
}