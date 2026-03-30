<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth'); // Vérifie que l'utilisateur est connecté
        $this->middleware('role:admin'); // Si tu utilises un système de rôles
    }

    public function index()
    {
        return view('admin.dashboard');
    }   
}