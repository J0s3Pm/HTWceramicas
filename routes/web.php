<?php

use App\Livewire\AtributoMain;
use App\Livewire\CategoriaMain;
use App\Livewire\ClienteMain;
use App\Livewire\DashboardMain;
use App\Livewire\IndexMain;
use App\Livewire\PedidoMain;
use App\Livewire\ProductoMain;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// Página principal
Route::get('/', IndexMain::class)->name('home');

// Login
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

// Panel administrativo
Route::middleware('auth')->group(function () {

    Route::get('/dashboard', DashboardMain::class)
    ->name('dashboard');

    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');

    Route::get('/categorias', CategoriaMain::class)
    ->name('categorias');

    Route::get('/productos', ProductoMain::class)
    ->name('productos');

    Route::get('/atributos', AtributoMain::class)
    ->name('atributos');

    Route::get('/clientes', ClienteMain::class)
    ->name('clientes');

    Route::get('/pedidos', PedidoMain::class)
    ->name('pedidos');
});

require __DIR__.'/settings.php';
