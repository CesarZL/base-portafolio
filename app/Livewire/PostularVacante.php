<?php

namespace App\Livewire;

use App\Models\Vacante;
use App\Notifications\NuevoCandidato;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class PostularVacante extends Component
{
    public $cv, $vacante;
    use WithFileUploads;
    protected $rules = [
        'cv' => 'required|mimes:pdf',
    ];

    public function mount(Vacante $vacante)
    {
        $this->vacante = $vacante;
    }

    public function postular()
    {
        // Validar 
        $datos = $this->validate();

        // Guardar el cv
        $cv = $this->cv->store('public/cv');
        $datos['cv'] = str_replace('public/cv/', '', $cv);

        $this->vacante->candidatos()->create([
            'user_id' => auth()->user()->id,
            'cv' => $datos['cv'],
            'vacante_id' => $this->vacante->id,
        ]);

        $this->vacante->reclutador->notify(new NuevoCandidato($this->vacante->id, $this->vacante->titulo, auth()->user()->id));

        

        session()->flash('mensaje', 'Postulación enviada con éxito');
        return redirect()->back();

    }

    public function render()
    {
        return view('livewire.postular-vacante');
    }
}
