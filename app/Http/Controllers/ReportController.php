<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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

    public function appointmentReport() {
        $appointments = Appointment::with('pet.client')->get();
        return view('reports.appointments', compact('appointments'));
    }
    
    public function inventoryReport() {
        $inventories = Inventory::all();
        return view('reports.inventory', compact('inventories'));
    }
    
    public function invoiceReport() {
        $invoices = Invoice::with('client')->get();
        return view('reports.invoices', compact('invoices'));
    }
    
}
