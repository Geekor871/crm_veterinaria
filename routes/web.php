<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ClientController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\InvoiceController;

Route::get('/', function () {
    return view('index');
})->middleware('auth');

Auth::routes(['register'=>false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/clients', ClientController::class);
Route::resource('/pets', PetController::class);
Route::resource('/appointments', AppointmentController::class);
Route::resource('/inventories', InventoryController::class);
Route::resource('/invoices', InvoiceController::class);

Route::get('reports/appointments', [ReportController::class, 'appointmentReport'])->name('reports.appointments');
Route::get('reports/inventory', [ReportController::class, 'inventoryReport'])->name('reports.inventory');
Route::get('reports/invoices', [ReportController::class, 'invoiceReport'])->name('reports.invoices');
Route::get('/pets', [PetController::class, 'index'])->name('pets.index');