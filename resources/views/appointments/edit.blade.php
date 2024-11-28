@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2>Editar datos de la Cita</h2>
        <form action="{{ route('appointments.update', $appointment -> id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="pet_id">Mascota</label>
                <select name="pet_id" class="form-control" required>
                    @foreach ($pets as $pet)
                        <option value="{{ $pet -> id }}"
                        {{ $appointment -> pet_id == $pet -> id ? 'selected' : ''}}>
                            {{ $pet -> nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="client_id">Dueño de la Mascota</label>
                <select name="client_id" class="form-control" required>
                    @foreach ($clients as $client)
                        <option value="{{ $client->id }}"
                        {{ $appointment->client_id == $client->id ? 'selected' : '' }}>
                            {{ $client->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>
            

            <div class="form-group">
                <label for="motivo">Motivo de la cita</label>
                <input type="text" name="motivo" class="form-control" 
                value="{{ $appointment  -> motivo }}" required>
            </div>

            <div class="form-group">
                <label for="observaciones">Notas o comentarios de la consulta</label>
                <input type="text" name="observaciones" class="form-control"
                value="{{ $appointment -> observaciones }}" required>
            </div>

            <div class="form-group">
                <label for="medico">Médico que realiza la consulta</label>
                <input type="text" name="medico" class="form-control"
                value="{{ $appointment -> medico }}" required>
            </div>

            <div class="form-group">
                <label for="veterinario">Veterinario asignado</label>
                <input type="text" name="veterinario" class="form-control"
                value="{{ $appointment -> veterinario }}" required>
            </div>

            <div class="form-group">
                <label for="receta">Prescribir Receta</label>
                <input type="text" name="receta" class="form-control"
                value="{{ $appointment -> receta }}">
            </div>

            <div class="form-group">
                <label for="fecha_hora">Fecha y hora de la consulta</label>
                <input type="datetime-local" name="fecha_hora" class="form-control" 
                value="{{ $appointment -> fecha_hora ?? '' }}">
            </div>

            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="{{ route('appointments.index') }}" class="btn btn-warning">Cancelar</a>
            
        </form>

    </div>
@endsection