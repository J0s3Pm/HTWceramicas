<?php

namespace App\Livewire;

use App\Models\Categoria;
use App\Models\Producto;
use Flux\Flux;
use Livewire\Component;
use Livewire\WithPagination;

class ProductoMain extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search = '';

    public $producto_id = 0;

    public $nombre = '';

    public $modelo = '';

    public $precio_referencial = '';

    public $categoria_id = '';

    protected function rules()
    {
        return [
            'nombre' => 'required|min:3|max:150',
            'modelo' => 'nullable|max:100',
            'precio_referencial' => 'required|numeric|min:0',
            'categoria_id' => 'required|exists:categorias,id',
        ];
    }

    public function render()
    {
        $productos = Producto::with('categoria')
            ->where('nombre', 'like', '%' . $this->search . '%')
            ->orderByDesc('id')
            ->paginate(10);

        return view('livewire.producto-main', [
            'productos' => $productos,
            'categorias' => Categoria::where('estado', 'ACTIVO')->orderBy('nombre')->get(),
            'total' => Producto::count(),
        ]);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function create()
    {
        $this->reset([
            'producto_id',
            'nombre',
            'modelo',
            'precio_referencial',
            'categoria_id',
        ]);

        Flux::modal('showform')->show();
    }

    public function save()
    {
        $this->validate();

        Producto::updateOrCreate(
            ['id' => $this->producto_id],
            [
                'nombre' => $this->nombre,
                'modelo' => $this->modelo,
                'precio_referencial' => $this->precio_referencial,
                'categoria_id' => $this->categoria_id,
            ]
        );

        Flux::modal('showform')->close();

        Flux::toast(
            text: $this->producto_id
                ? 'Producto actualizado correctamente.'
                : 'Producto registrado correctamente.'
        );

        $this->create();
    }

    public function edit($id)
    {
        $producto = Producto::findOrFail($id);

        $this->producto_id = $producto->id;
        $this->nombre = $producto->nombre;
        $this->modelo = $producto->modelo;
        $this->precio_referencial = $producto->precio_referencial;
        $this->categoria_id = $producto->categoria_id;

        Flux::modal('showform')->show();
    }

    public function delete($id)
    {
        Producto::findOrFail($id)->delete();

        Flux::toast(
            text: 'Producto eliminado correctamente.'
        );
    }
}
