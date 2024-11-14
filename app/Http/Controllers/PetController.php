<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pet;
use App\Models\Client;

class PetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $pets = Pet::with('client')->get();
        return view('pets.index', compact('pets')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clients = Client::all();
        return view('pets.create', compact('clients'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:75',
            'especie' => 'required|string',
            'raza' => 'nullable|string',
            'client_id' => 'nullable|integer',
        ]);

        Pet::create($request->all());

        return redirect()->route('pets.index')
        ->with('sucess', 'Mascota añadida con exito.');
    }

    public function show($id)
    {
        $pet = Pet::with('client')->findOrFail($id);
        return view('pets.show', compact('pet'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $pet = Pet::findOrFail($id);
        $clients = Client::all();
        return view('pets.edit', compact('pet', 'clients'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:75',
            'especie' => 'required|string',
            'raza' => 'nullable|string',
            'client_id' => 'nullable|integer',
        ]);

        $pet = Pet::findOrFail($id);
        $pet->update($request->all());

        return redirect()->route('pets.index')
        ->with('success', 'Mascota actualizada correctamente.');
    }

    public function destroy($id)
    {
        $pet = Pet::findOrFail($id);
        $pet->delete();

        return redirect()->route('pets.index')
        ->with('success', 'Mascota eliminada correctamente.');
    }
}
