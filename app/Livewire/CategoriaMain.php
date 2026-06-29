<?php

namespace App\Livewire;


use App\Models\Categoria;
use Flux\Flux;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class CategoriaMain extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search = '';

    public $categoria_id = 0;

    public $nombre = '';

    public $estado = 'ACTIVO';

    protected function rules()
    {
        return [
            'nombre' => 'required|min:3|max:100|unique:categorias,nombre,' . $this->categoria_id,
            'estado' => 'required'
        ];
    }

    public function render()
    {
        $categorias = Categoria::with('user')
            ->where('nombre', 'like', '%' . $this->search . '%')
            ->orderByDesc('id')
            ->paginate(10);

        return view('livewire.categoria-main', [
            'categorias' => $categorias,
            'total' => Categoria::count(),
            'activas' => Categoria::where('estado', 'ACTIVO')->count(),
            'inactivas' => Categoria::where('estado', 'INACTIVO')->count(),
        ]);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function create()
    {
        $this->reset([
            'categoria_id',
            'nombre'
        ]);

        $this->estado = 'ACTIVO';

        Flux::modal('showform')->show();
    }

    public function save()
    {
        $this->validate();

        Categoria::updateOrCreate(

            ['id' => $this->categoria_id],

            [

                'nombre' => $this->nombre,

                'estado' => $this->estado,

                'user_id' => Auth::id(),

            ]

        );

        Flux::modal('showform')->close();

        Flux::toast(
            text: $this->categoria_id
                ? 'Categoría actualizada correctamente.'
                : 'Categoría registrada correctamente.'
        );

        $this->create();
    }

    public function edit($id)
    {
        $categoria = Categoria::findOrFail($id);

        $this->categoria_id = $categoria->id;
        $this->nombre = $categoria->nombre;
        $this->estado = $categoria->estado;

        Flux::modal('showform')->show();
    }

    public function delete($id)
    {
        Categoria::findOrFail($id)->delete();

        Flux::toast(
            text: 'Categoría eliminada correctamente.'
        );
    }
}
