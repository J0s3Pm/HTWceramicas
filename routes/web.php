<?php

use App\Livewire\CategoriaMain;
use App\Http\Controllers\AuthController;
use App\Livewire\IndexMain;
use Illuminate\Support\Facades\Route;

// Página principal
Route::get('/', IndexMain::class)->name('home');

// Login
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

// Panel administrativo
Route::middleware('auth')->group(function () {

    Route::view('/dashboard', 'dashboard.index')
    ->name('dashboard');

    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');

    Route::get('/categorias', CategoriaMain::class)
    ->name('categorias');
});

require __DIR__.'/settings.php';
