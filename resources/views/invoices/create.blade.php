@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Factura Nueva</h1>

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
                <label for="product_id">Producto</label>
                <select name="product_id" class="form-control" required>
                    @foreach ($products as $product)
                        <option value="{{ $product->id }}" 
                            {{ old('product_id') == $product->id ? 'selected' : ''}}>
                            {{ $product->nombre }} (Stock: {{ $product->cantidad }} | Precio: ${{ $product->costo }})
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="cantidad">Cantidad</label>
                <input type="number" name="cantidad" class="form-control" 
                value="{{ old('cantidad') }}" min="1" required>
            </div>

            <div class="form-group">
                <label for="total">Total</label>
                <input type="text" name="total" class="form-control" 
                value="{{ old('total') }}" readonly>
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
