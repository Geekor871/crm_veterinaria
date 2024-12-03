@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Facturación</h1>
    <a href="{{ route('invoices.create') }}" class="btn btn-primary">Generar Factura</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>Razón</th>
                <th>Productos</th>
                <th>Total</th>
                <th>Pago</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($invoices as $invoice)
                <tr>
                    <td>{{ $invoice->id }}</td>
                    <td>{{ $invoice->client->nombre }}</td>
                    <td>{{ $invoice->razon }}</td>
                    <td>{{ $invoice->productos }}</td>
                    <td>{{ $invoice->total }}</td>
                    <td>{{ $invoice->pago }}</td>
                    <td>
                            <a href="{{ route('invoices.edit', $invoice->id) }}" 
                            class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('invoices.destroy', $invoice->id) }}" 
                            method="POST"  style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Estas seguro que quieres eliminar esta Factura?')">Eliminar</button>
                            </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection