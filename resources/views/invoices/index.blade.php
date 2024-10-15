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
                <th>Total</th>
                <th>Estado</th>
                <th>Fecha</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($invoices as $invoice)
                <tr>
                    <td>{{ $invoice->id }}</td>
                    <td>{{ $invoice->client->nombre }}</td>
                    <td>{{ $invoice->total }}</td>
                    <td>{{ $invoice->estado }}</td>
                    <td>{{ $invoice->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection