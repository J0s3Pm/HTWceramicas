<?php

namespace App\Livewire;

use App\Models\Cliente;
use Flux\Flux;
use Livewire\Component;
use Livewire\WithPagination;

class ClienteMain extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search = '';

    public $cliente_id = 0;

    public $nombre = '';

    public $apellido = '';

    public $contacto = '';

    protected function rules()
    {
        return [
            'nombre' => 'required|min:3|max:100',
            'apellido' => 'nullable|max:100',
            'contacto' => 'nullable|max:150',
        ];
    }

    public function render()
    {
        $clientes = Cliente::where('nombre', 'like', '%' . $this->search . '%')
            ->orderByDesc('id')
            ->paginate(10);

        return view('livewire.cliente-main', [
            'clientes' => $clientes,
            'total' => Cliente::count(),
        ]);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function create()
    {
        $this->reset([
            'cliente_id',
            'nombre',
            'apellido',
            'contacto',
        ]);

        Flux::modal('showform')->show();
    }

    public function save()
    {
        $this->validate();

        Cliente::updateOrCreate(
            ['id' => $this->cliente_id],
            [
                'nombre' => $this->nombre,
                'apellido' => $this->apellido,
                'contacto' => $this->contacto,
            ]
        );

        Flux::modal('showform')->close();

        Flux::toast(
            text: $this->cliente_id
                ? 'Cliente actualizado correctamente.'
                : 'Cliente registrado correctamente.'
        );

        $this->create();
    }

    public function edit($id)
    {
        $cliente = Cliente::findOrFail($id);

        $this->cliente_id = $cliente->id;
        $this->nombre = $cliente->nombre;
        $this->apellido = $cliente->apellido;
        $this->contacto = $cliente->contacto;

        Flux::modal('showform')->show();
    }

    public function delete($id)
    {
        Cliente::findOrFail($id)->delete();

        Flux::toast(
            text: 'Cliente eliminado correctamente.'
        );
    }
}
