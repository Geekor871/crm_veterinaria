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

        <form action="{{ route('pets.store') }}" method="POST">
            @csrf    
            <div class="form-group">
                <label for="nombre">Nombre de la Mascota</label>
                <input type="text" name="nombre" class="form-control" 
                value="{{ old('nombre', $pet->nombre ?? '') }}" required>
            </div>

            <div class="form-group">
                <label for="especie">Especie</label>
                <input type="text" name="especie" class="form-control" 
                value="{{ old('especie', $pet->especie ?? '') }}" required>
            </div>

            <div class="form-group">
                <label for="raza">Raza</label>
                <input type="text" name="raza" class="form-control" 
                value="{{ old('raza', $pet->raza ?? '') }}" required>
            </div>

            <div class="form-group">
                <label for="client_id">Cliente</label>
                <select name="client_id" class="form-control" required>
                    @foreach ($clients as $client)
                        <option value="{{ $client->id }}" 
                            {{ old('client_id', $pet->client_id ?? '') == 
                                $client->id ? 'selected' : ''}}>
                            {{ $client->nombre }}
                        </option>
                    @endforeach
                </select>
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