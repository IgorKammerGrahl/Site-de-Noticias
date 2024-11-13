<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    Route::middleware('auth')->group(function () {
        // Rotas protegidas
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    });
}
