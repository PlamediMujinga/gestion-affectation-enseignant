<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\AuthService;
use App\Http\Requests\RegisterRequest;

class RegisterController extends Controller
{
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(RegisterRequest $request)
    {
        try{
            $this->authService->register($request->validated());
            return redirect('/login')->with('success', 'Compte créé');
        } catch (\Exception $e) {
            return back()->withErrors($e->getMessage());
        }
    }
}