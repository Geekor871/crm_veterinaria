@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Editar Factura</h2>
    <form action="{{ route('invoices.update', $invoice->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="razon">Razón</label>
            <input type="text" name="razon" class="form-control" 
            value="{{ $invoice->razon }}" required>
        </div>

        <div class="form-group">
            <label for="productos">Productos</label>
            <input type="text" name="productos" class="form-control" 
            value="{{ $invoice->productos }}">
        </div>

        <div class="form-group">
            <label for="total">Total</label>
            <input type="number" step="0.01" name="total" class="form-control" 
            value="{{ $invoice->total }}" required>
        </div>

        <div class="form-group">
            <label for="pago">Método de Pago</label>
            <input type="text" name="pago" class="form-control" 
            value="{{ $invoice->pago }}" required>
        </div>

        <div class="form-group">
            <label for="client_id">Cliente</label>
            <select name="client_id" class="form-control" required>
                <option value="">Seleccione un cliente</option>
                @foreach ($clients as $client)
                    <option value="{{ $client->id }}" 
                    {{ $invoice->client_id == $client->id ? 'selected' : '' }}>
                        {{ $client->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('invoices.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
