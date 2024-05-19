<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Vacante;
use App\Models\Salario;
use App\Models\Categoria;
use Illuminate\Support\Carbon;


class EditarVacante extends Component
{
    public $titulo, $salario, $categoria, $empresa, $ultimo_dia, $descripcion, $imagen, $imagen_nueva, $vacante_id;
    use WithFileUploads;

    public function mount(Vacante $vacante)
    {
        $this->vacante_id = $vacante->id;
        $this->titulo = $vacante->titulo;
        $this->salario = $vacante->salario_id;
        $this->categoria = $vacante->categoria_id;
        $this->empresa = $vacante->empresa;
        $this->ultimo_dia = Carbon::parse($vacante->ultimo_dia)->format('Y-m-d');
        $this->descripcion = $vacante->descripcion;
        $this->imagen = $vacante->imagen;
    }

    public function render()
    {
        $salarios = Salario::all();
        $categorias = Categoria::all();
        return view('livewire.editar-vacante', [
            'salarios' => $salarios, 
            'categorias' => $categorias
        ]);
    }

    protected $rules = [
        'titulo' => 'required|string|min:6|max:255',
        'salario' => 'required',
        'categoria' => 'required',
        'empresa' => 'required|string|min:6|max:255',
        'ultimo_dia' => 'required|date',
        'descripcion' => 'required|string|min:6',
        'imagen_nueva' => 'nullable|image|max:2048',
    ];

    public function editarVacante()
    {
        $datos = $this->validate();

        if ($this->imagen_nueva) {
            $imagen = $this->imagen_nueva->store('public/vacantes');
            $datos['imagen'] = str_replace('public/vacantes/', '', $imagen);
        }

        // Actualizar la vacante
        $vacante = Vacante::find($this->vacante_id);
        $vacante->titulo = $datos['titulo'];
        $vacante->salario_id = $datos['salario'];
        $vacante->categoria_id = $datos['categoria'];
        $vacante->empresa = $datos['empresa'];
        $vacante->ultimo_dia = $datos['ultimo_dia'];
        $vacante->descripcion = $datos['descripcion'];
        $vacante->imagen = $datos['imagen'] ?? $vacante->imagen;

        // Guardar la vacante
        $vacante->save();
        
        session()->flash('mensaje', 'La vacante se actualizó correctamente');

        return redirect()->route('vacantes.index');
    }

}
