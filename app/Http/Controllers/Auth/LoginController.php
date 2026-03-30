<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\AuthService;
use App\Services\AuditService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    protected $authService;
    protected $auditService;

    public function __construct(AuthService $authService, AuditService $auditService)
    {
        $this->authService = $authService;
        $this->auditService = $auditService;
    }

    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        try{
            $user = $this->authService->login($request->only('email', 'password'));

            //Log
            $this->auditService->log(
                    'login_success',
                    'Connexion reussi : ' . $user['email']
                );

            return $this->redirectByRole($user);
        } catch (\Exception $e) {
            return back()->withErrors($e->getMessage());
        }
    }
    
    private function redirectByRole($user)
    {
        if($user->hasRole('enseignant')) 
            return redirect('/enseignant/dashboard');
        if($user->hasRole('ecole')) 
            return redirect('/ecole/dashboard');
        if($user->hasRole('sous_proved')) 
            return redirect('/sous-proved/dashboard');
        if($user->hasRole('proved')) 
            return redirect('/proved/dashboard');
        if($user->hasRole('admin')) 
            return redirect('/admin/dashboard');

        return redirect('/');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}