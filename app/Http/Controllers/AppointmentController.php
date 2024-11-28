<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Client;
use App\Models\Pet;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $appointment = Appointment::all();
        
        return view('appointments.index', compact('appointment'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clientsAppointment = Client::all();
        $petsAppointment = Pet::all();
        return view('appointments.create', compact('clientsAppointment','petsAppointment'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request -> validate([
            'fecha_hora' => 'nullable|date_format:Y-m-d\TH:i',
            'motivo' => 'required|string',
            'observaciones' => 'required|string',
            'pet_id' => 'required',
            'medico' => 'required|string',
            'veterinario' => 'required|string',
            'receta' => 'nullable|string'
        ]);

        Appointment::create($request -> all());

        return redirect() -> route('appointments.index')
        -> with('success', 'Cita añadida con exito');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $appointment = Appointment::all() -> findOrFail($id);
        
        return view('appointments.show', compact('appointment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $appointment = Appointment::all() -> findOrFail($id);
        $pets = Pet::all();
        $clients = Client::all();
        return view('appointments.edit', compact('appointment', 'pets', 'clients'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request -> validate([
            'fecha_hora' => 'nullable|date_format:Y-m-d\TH:i',
            'motivo' => 'required|string',
            'observaciones' => 'required|string',
            'pet_id' => 'required',
            'medico' => 'required|string',
            'veterinario' => 'required|string',
            'receta' => 'nullable|string'
        ]);

        $appointment = Appointment::findOrFail($id);
        $appointment -> update($request -> all());

        return redirect() -> route('appointments.index')
        -> with('success', 'Mascota actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment -> delete();

        return redirect() -> route('appointments.index')
        -> with('success', 'Cita eliminada correctamente');
    }
}
