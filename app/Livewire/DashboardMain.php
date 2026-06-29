<?php

namespace App\Livewire;

use App\Models\Atributo;
use App\Models\Categoria;
use App\Models\Cliente;
use App\Models\Pedido;
use App\Models\Producto;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.admin')]
class DashboardMain extends Component
{
    public function render()
    {
        return view('livewire.dashboard-main', [
            'totalProductos' => Producto::count(),
            'totalCategorias' => Categoria::count(),
            'totalAtributos' => Atributo::count(),
            'totalClientes' => Cliente::count(),
            'totalPedidos' => Pedido::count(),
            'pedidosPendientes' => Pedido::where('estado', 'PENDIENTE')->count(),
            'ultimosProductos' => Producto::with('categoria')->latest()->take(5)->get(),
        ]);
    }
}
