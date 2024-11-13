<?php

namespace App\Http\Controllers;

use App\Models\Noticia; 

class NoticiaController extends Controller
{
    public function index()
    {
        $noticias = Noticia::all(); 

        
        if ($noticias->isEmpty()) {
            return view('noticia.index')->with('message', 'Nenhuma notícia disponível.');
        }

        return view('noticia.index', compact('noticias'));
    }

    public function show($id)
    {
        $noticia = Noticia::findOrFail($id); 
        return view('noticia.show', compact('noticia'));
    }
}