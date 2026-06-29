<?php

namespace App\Livewire;

use App\Models\Atributo;
use Flux\Flux;
use Livewire\Component;
use Livewire\WithPagination;

class AtributoMain extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search = '';

    public $atributo_id = 0;

    public $nombre = '';

    public $unidad_medida = '';

    protected function rules()
    {
        return [
            'nombre' => 'required|min:3|max:100',
            'unidad_medida' => 'nullable|max:50',
        ];
    }

    public function render()
    {
        $atributos = Atributo::where('nombre', 'like', '%' . $this->search . '%')
            ->orderByDesc('id')
            ->paginate(10);

        return view('livewire.atributo-main', [
            'atributos' => $atributos,
            'total' => Atributo::count(),
        ]);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function create()
    {
        $this->reset([
            'atributo_id',
            'nombre',
            'unidad_medida',
        ]);

        Flux::modal('showform')->show();
    }

    public function save()
    {
        $this->validate();

        Atributo::updateOrCreate(
            ['id' => $this->atributo_id],
            [
                'nombre' => $this->nombre,
                'unidad_medida' => $this->unidad_medida,
            ]
        );

        Flux::modal('showform')->close();

        Flux::toast(
            text: $this->atributo_id
                ? 'Atributo actualizado correctamente.'
                : 'Atributo registrado correctamente.'
        );

        $this->create();
    }

    public function edit($id)
    {
        $atributo = Atributo::findOrFail($id);

        $this->atributo_id = $atributo->id;
        $this->nombre = $atributo->nombre;
        $this->unidad_medida = $atributo->unidad_medida;

        Flux::modal('showform')->show();
    }

    public function delete($id)
    {
        Atributo::findOrFail($id)->delete();

        Flux::toast(
            text: 'Atributo eliminado correctamente.'
        );
    }
}
