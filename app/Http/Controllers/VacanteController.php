<?php

namespace App\Http\Controllers;

use App\Models\Vacante;
use Illuminate\Http\Request;
use App\Providers\AppServiceProvider;
use Illuminate\Support\Facades\Gate;

class VacanteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', Vacante::class);
        return view('vacantes.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Vacante::class);
        return view('vacantes.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $vacante = Vacante::find($id);
        return view('vacantes.show', [
            'vacante' => $vacante
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $id)
    {
        $vacante = Vacante::find($id);
        
        $this->authorize('update', $vacante);

        return view('vacantes.edit', [
            'vacante' => $vacante 
        ]);       
    }

}
