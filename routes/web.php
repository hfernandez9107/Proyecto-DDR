<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| RUTAS PÚBLICAS
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| RUTAS PROTEGIDAS (requieren autenticación)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {

    // ========================================
    // DASHBOARD
    // ========================================
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard-data', [DashboardController::class, 'data'])->name('dashboard.data');

    // ========================================
    // REPORTES
    // ========================================
    Route::get('/reportes', function () {
        return view('reportes.index');
    })->name('reportes');

    // ========================================
    // PERFIL
    // ========================================
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // ========================================
    // BUSCADOR DE PERSONAS
    // ========================================
    Route::get('/persona', [PersonaController::class, 'index'])->name('persona.index');
    Route::post('/persona/buscar', [PersonaController::class, 'buscar'])->name('persona.buscar');
});

/*
|--------------------------------------------------------------------------
| AUTENTICACIÓN
|--------------------------------------------------------------------------
*/
require __DIR__.'/auth.php';