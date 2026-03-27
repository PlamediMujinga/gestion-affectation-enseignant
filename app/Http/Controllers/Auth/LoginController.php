<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return $this->redirectByRole(Auth::user());
        }

        return back()->withErrors(['email' => 'Identifiants incorrects']);
    }
    
    private function redirectByRole($user)
    {
    }
}