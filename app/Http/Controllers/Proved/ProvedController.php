<?php

namespace App\Http\Controllers\Proved;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProvedController extends Controller
{
    
    private function provedConnect()
    {
        return auth()->user()->proved()->with(['sousProved.ecole.enseignant'])->first();
    }

 // ecole
    
    public function ecoleProved()
    
    {
        $proved = $this->provedConnect();
        return view('proved.ecoles.index', compact('proved'));
        
    }

// enseignant
    
    public function enseignantProved()
    
    {
        $proved = $this->provedConnect();
        return view('proved.enseignants.index', compact('proved'));
    }
// affectation
    
    public function affectationtProved()
    
    {
        $proved = $this->provedConnect();
        return view('proved.affectations.index', compact('proved'));
    }
// division
    
    public function divisionProved()
    
    {
        $proved = $this->provedConnect();
        return view('proved.divisions.index', compact('proved'));
    }
// statistique
    
    public function statistiqueProved()
    
    {
        $proved = $this->provedConnect();
        return view('proved.statistiques.index', compact('proved'));
    }
// mutation
    
    public function mutationProved()
    
    {
        $proved = $this->provedConnect();
        return view('proved.mutations.index', compact('proved'));
    }
// notification
    
    public function notificationProved()
    
    {
        $proved = $this->provedConnect();
        return view('proved.notifications.index', compact('proved'));
    }

 // dashabor   

    public function index()
    {
        $proved = $this->provedConnect();
        return view('proved.dashboard', compact('proved'));
    }


    public function profil()
    {
        $proved = $this->provedConnect();
        return view('proved.profil', compact('proved'));
    }



    


    




    
   

    

    
}



    
    

    










