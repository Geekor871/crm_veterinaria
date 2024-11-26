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
            'fecha_hora' => 'required',
            'motivo' => 'required|string',
            'observaciones' => 'required|string',
            'pet_id' => 'required|integer|exists:pets.id'
        ],[
        
            'fecha_hora.required' => 'La fecha y hora son obligatorias.',
            'motivo.required' => 'El motivo es obligatorio.',
            'observaciones.required' => 'Las observaciones son obligatorias.',
            'pet_id.exists' => 'El ID de la mascota no es válido.' 
        ]);

        Appointment::create($request -> all());

        return redirect() -> route('appointments.index')
        -> with('success', 'Cita añadida con exito');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
