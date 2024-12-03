<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Models\Invoice;

class InvoiceController extends Controller
{
    public function index() {
        $invoices = Invoice::with('client')->get();
        return view('invoices.index', compact('invoices'));
    }

    public function create() {
        $clients = Client::all();
        return view('invoices.create', compact('clients'));
    }

     public function store(Request $request)
    {
        $request->validate([
            'razon' => 'required|string|max:255',
            'productos' => 'required|string|max:255',
            'total' => 'required|numeric|min:0',
            'pago' => 'required|string|max:50',
            'client_id' => 'required|exists:clients,id', // Valida la clave foránea
        ]);

        Invoice::create($request->all());

        return redirect()
            ->route('invoices.index')
            ->with('success', 'Factura añadida con éxito');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $invoice = Invoice::with('client')->findOrFail($id);
        return view('invoice.show', compact('invoice'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $invoice = Invoice::findOrFail($id);
        $clients = Client::all();
        return view('invoices.edit', compact('invoice', 'clients'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'client_id' => 'required|integer',
            'razon' => 'required|string|max:255',
            'productos' => 'nullable|string|max:255',
            'total' => 'required|numeric|min:0',
            'pago' => 'required|string|max:50',
        ]);

        $invoice = Invoice::findOrFail($id);
        $invoice->update($request->all());

        return redirect()->route('invoices.index')
            ->with('success', 'Factura actualizada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $invoice = Invoice::findOrFail($id);
        $invoice->delete();

        return redirect()->route('invoices.index')
            ->with('success', 'Factura eliminada correctamente.');
    }
}