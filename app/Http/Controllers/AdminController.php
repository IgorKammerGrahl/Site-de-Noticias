<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function create()
    {
        $empresas = Empresa::all();  // Listar empresas para atribuir ao novo usuário
        return view('admin.create_user', compact('empresas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed',
            'empresa_id' => 'required|exists:empresas,id',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'empresa_id' => $request->empresa_id,
        ]);

        return redirect()->route('admin.users.index');
    }
}
