@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Factura nueva</h1>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('invoices.store') }}" method="POST">
            @csrf    
            <div class="form-group">
                <label for="client_id">Cliente</label>
                <select name="client_id" class="form-control" required>
                    @foreach ($clients as $client)
                        <option value="{{ $client->id }}" 
                            {{ old('client_id', $invoice->client_id ?? '') == 
                                $client->id ? 'selected' : ''}}>
                            {{ $client->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="razon">Razón</label>
                <input type="text" name="razon" class="form-control" 
                value="{{ old('razon', $invoice->razon ?? '') }}" required>
            </div>

            <div class="form-group">
                <label for="productos">Productos (separe con coma)</label>
                <input type="text" name="productos" class="form-control" 
                value="{{ old('productos', $invoice->productos ?? '') }}" required>
            </div>

            <div class="form-group">
                <label for="total">Total</label>
                <input type="text" name="total" class="form-control" 
                value="{{ old('total', $invoice->total ?? '') }}" required>
            </div>

            <div class="form-group">
                <label for="pago">Pago</label>
                <input type="text" name="pago" class="form-control" 
                value="{{ old('pago', $invoice->pago ?? '') }}" required>
            </div>

            <button type="submit" class="btn btn-primary">
                Guardar
            </button>

            <a href="{{ route('invoices.index') }}" 
            class="btn btn-secondary">
                Cancelar
            </a>
        </form>
    </div>

@endsection