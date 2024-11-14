@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Editar Mascota</h2>
    <form action="{{ route('pets.update', $pet->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" class="form-control"
            value="{{ $pet->nombre }}" required>
        </div>
        <div class="form-group">
            <label for="especie">Especie</label>
            <input type="text" name="especie" class="form-control"
            value="{{ $pet->especie }}" required>
        </div>
        <div class="form-group">
            <label for="raza">Raza</label>
            <input type="text" name="raza" class="form-control"
            value="{{ $pet->raza }}" required>
        </div>
        <div class="form-group">
            <label for="client_id">Cliente</label>
            <select name="client_id" class="form-control" required>
                <option value="">Sin Asignar</option>
                @foreach ($clients as $client)
                    <option value="{{ $client->id }}" 
                    {{ $pet->client_id == $client->id ? 'selected' : '' }}>
                        {{ $client->nombre }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('pets.index') }}">Cancelar</a>
    </form>
</div>
@endsection