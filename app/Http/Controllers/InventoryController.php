<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventory;

class InventoryController extends Controller
{
    public function index() {
        $inventories = Inventory::all();
        return view('inventories.index', compact('inventories'));
    }
    
    public function create() {
        return view('inventories.create');
    }
    
    public function store(Request $request) {
        Inventory::create($request->all());
        return redirect()->route('inventories.index');
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
