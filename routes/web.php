<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoticiaController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\Auth\AuthController; 

Route::get('/', [NoticiaController::class, 'index']);

Route::get('login', [AuthController::class, 'loginForm'])->name('login');

Route::post('login', [AuthController::class, 'login']);

Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::resource('noticias', NoticiaController::class)->only(['create', 'store']);
});

Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::resource('usuarios', UsuarioController::class)->only(['create', 'store']);
    Route::resource('empresas', EmpresaController::class)->only(['create', 'store']);
});

Route::middleware('auth')->get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/noticias/{id}', [NoticiaController::class, 'show'])->name('noticias.show');

Auth::routes();

