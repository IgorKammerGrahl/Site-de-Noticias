<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view('auth.login'); 
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'empresa_id' => 'required|exists:empresas,id', 
        ]);

        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
            'empresa_id' => $request->empresa_id
        ])) {
            return redirect()->route('dashboard'); 
        }

        return back()->withErrors([
            'email' => 'As credenciais não são válidas.',
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login'); 
    }
}