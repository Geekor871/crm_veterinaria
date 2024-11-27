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

    public function store(Request $request) {
        Invoice::create($request->all());
        return redirect()->route('invoices.index');
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
