<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoticiaController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\UsuarioController;

Route::get('/', [NoticiaController::class, 'index']);

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::resource('noticias', NoticiaController::class)->only(['create', 'store']);
});

Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::resource('usuarios', UsuarioController::class)->only(['create', 'store']);
    Route::resource('empresas', EmpresaController::class)->only(['create', 'store']);
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/noticias/{id}', [NoticiaController::class, 'show'])->name('noticias.show');

