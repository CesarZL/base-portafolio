<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Salario;
use App\Models\Categoria;
use App\Models\Vacante;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class CrearVacante extends Component
{

    public $titulo, $salario, $categoria, $empresa, $ultimo_dia, $descripcion, $imagen;
    use WithFileUploads;

    protected $rules = [
        'titulo' => 'required|string|min:6|max:255',
        'salario' => 'required',
        'categoria' => 'required',
        'empresa' => 'required|string|min:6|max:255',
        'ultimo_dia' => 'required|date',
        'descripcion' => 'required|string|min:6',
        'imagen' => 'required|image|max:2048',
    ];

    public function crearVacante()
    {
        $datos = $this->validate();

        $imagen = $this->imagen->store('public/vacantes');
        $datos['imagen'] = str_replace('public/vacantes/', '', $imagen);
        
        Vacante::create([
            'titulo' => $datos['titulo'],
            'salario_id' => $datos['salario'],
            'categoria_id' => $datos['categoria'],
            'empresa' => $datos['empresa'],
            'ultimo_dia' => $datos['ultimo_dia'],
            'descripcion' => $datos['descripcion'],
            'imagen' => $datos['imagen'],
            'user_id' => auth()->user()->id,
        ]);

        session()->flash('mensaje', 'La vacante se publicó correctamente');

        return redirect()->route('vacantes.index');
    }

    public function render()
    {
        $salarios = Salario::all();
        $categorias = Categoria::all();
        return view('livewire.crear-vacante', [
            'salarios' => $salarios, 
            'categorias' => $categorias
        ]);
    }
}
