<?php

namespace App\Livewire;

use App\Models\Salario;
use App\Models\Categoria;
use Livewire\Component;

class FiltrarVacantes extends Component
{
    public $termino, $categoria, $salario;

    public function LeerDatosFormulario()
    {
        $this->dispatch('terminosBusqueda', $this->termino, $this->categoria, $this->salario);
    }

    public function render()
    {
        $salarios = Salario::all();
        $categorias = Categoria::all(); 
        return view('livewire.filtrar-vacantes',
        [
            'salarios' => $salarios,
            'categorias' => $categorias
        ]);
    }
}
