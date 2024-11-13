<?php

namespace App\Http\Controllers;

use App\Models\Noticia;
use Illuminate\Http\Request;

class NoticiaController extends Controller
{
    public function create()
    {
        return view('noticia.create');  
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'conteudo' => 'required',
        ]);

        $user_id = auth()->user()->id;
        $empresa_id = auth()->user()->empresa_id;

        Noticia::create([
            'titulo' => $request->titulo,
            'conteudo' => $request->conteudo,
            'empresa_id' => $empresa_id,  
            'user_id' => $user_id,        
        ]);

        return redirect()->route('noticia.index');  
    }

    public function index()
    {
        if (auth()->check()) {
            $empresa_id = auth()->user()->empresa_id;  
        } else {
            $empresa_id = null;  
        }

        $noticias = Noticia::where('empresa_id', $empresa_id)->get();  

        return view('noticia.index', compact('noticias'));  
    }
}