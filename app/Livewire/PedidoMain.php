<?php

namespace App\Livewire;

use App\Models\Cliente;
use App\Models\Pedido;
use Flux\Flux;
use Livewire\Component;
use Livewire\WithPagination;

class PedidoMain extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search = '';

    public $pedido_id = 0;

    public $estado = 'PENDIENTE';

    public $fecha = '';

    public $cliente_id = '';

    protected function rules()
    {
        return [
            'estado' => 'required|in:PENDIENTE,PROCESO,ENTREGADO,ANULADO',
            'fecha' => 'required|date',
            'cliente_id' => 'required|exists:clientes,id',
        ];
    }

    public function render()
    {
        $pedidos = Pedido::with('cliente')
            ->whereHas('cliente', function ($query) {
                $query->where('nombre', 'like', '%' . $this->search . '%');
            })
            ->orWhere('estado', 'like', '%' . $this->search . '%')
            ->orderByDesc('id')
            ->paginate(10);

        return view('livewire.pedido-main', [
            'pedidos' => $pedidos,
            'clientes' => Cliente::orderBy('nombre')->get(),
            'total' => Pedido::count(),
            'pendientes' => Pedido::where('estado', 'PENDIENTE')->count(),
            'entregados' => Pedido::where('estado', 'ENTREGADO')->count(),
        ]);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function create()
    {
        $this->reset([
            'pedido_id',
            'fecha',
            'cliente_id',
        ]);

        $this->estado = 'PENDIENTE';

        Flux::modal('showform')->show();
    }

    public function save()
    {
        $this->validate();

        Pedido::updateOrCreate(
            ['id' => $this->pedido_id],
            [
                'estado' => $this->estado,
                'fecha' => $this->fecha,
                'cliente_id' => $this->cliente_id,
            ]
        );

        Flux::modal('showform')->close();

        Flux::toast(
            text: $this->pedido_id
                ? 'Pedido actualizado correctamente.'
                : 'Pedido registrado correctamente.'
        );

        $this->create();
    }

    public function edit($id)
    {
        $pedido = Pedido::findOrFail($id);

        $this->pedido_id = $pedido->id;
        $this->estado = $pedido->estado;
        $this->fecha = $pedido->fecha->format('Y-m-d');
        $this->cliente_id = $pedido->cliente_id;

        Flux::modal('showform')->show();
    }

    public function delete($id)
    {
        Pedido::findOrFail($id)->delete();

        Flux::toast(
            text: 'Pedido eliminado correctamente.'
        );
    }
}
