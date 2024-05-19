<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Vacante;
use Livewire\Attributes\On; 


class HomeVacantes extends Component
{

    public $termino, $categoria, $salario;

    protected $listeners = ['terminosBusqueda' => 'buscar']; 

    public function buscar($termino, $categoria, $salario)
    {
        $this->termino = $termino;
        $this->categoria = $categoria;
        $this->salario = $salario;
    }


    public function render()
    {
        $vacantes = Vacante::when($this->termino, function($query){
            $query->where('titulo', 'LIKE', '%' . $this->termino . '%');
        })->when($this->categoria, function($query){
            $query->orWhere('empresa', 'LIKE', '%' . $this->termino . '%');
        })->when($this->salario, function($query){
            $query->where('categoria_id', 'LIKE', '%' . $this->categoria . '%');
        })->when($this->salario, function($query){
            $query->where('salario_id', 'LIKE', '%' . $this->salario . '%');
        })->get();

        return view('livewire.home-vacantes', 
        [
            'vacantes' => $vacantes
        ]);
    }
}
