@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Añadir Nueva Cita</h1>

        @if ($errors->all())
            <div class="alert alert-danger">
                <ul>
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </div>
                </ul>
            </div>
        @endif


        <form action="{{ route('appointments.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="motivo">Motivo de la cita</label>
                <input type="text" name="motivo" class="form-control" 
                value="{{ old('motivo') }}"required>
            </div>

            <div class="form-group">
                <label for="veterinario">Veterinario</label>
                <input type="text" name="veterinario" class="form-control" 
                value="{{ old('veterinario') }}" required>
            </div>

            <div class="form-group">
                <label for="pet_id">Mascota</label>
                <select name="pet_id" class="form-control" required>
                    @foreach ($petsAppointment as $pet)
                        <option value="{{ $pet->id }}" 
                            {{ old('pet_id', $appointment->pet_id ?? '') == 
                                $pet->id ? 'selected' : ''}}>
                            {{ $pet->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="dueño">Dueño de la Mascota</label>
                <select name="dueño" class="form-control" required>
                    @foreach ($clientsAppointment as $dueño)
                        <option value="{{ $dueño->id }}" 
                            {{ old('cliente_id', $appointment->cliente_id ?? '') == 
                                $dueño->id ? 'selected' : ''}}>
                            {{ $dueño->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="medico">Médico que realiza la consulta</label>
                <input type="text" name="medico" class="form-control" 
                value="{{ old('medico') }}" required>
            </div>  
            
            <div class="form-group">
                <label for="observaciones">Comentarios de la consulta</label>
                <input type="text" name="observaciones" class="form-control" 
                value="{{ old('observaciones') }}" required>
            </div>

            <div class="form-group">
                <label for="receta">Prescribir Receta</label>
                <input type="text" name="receta" class="form-control" 
                value="{{ old('receta') }}" required>
            </div>

            <div class="form-group">
                
                <input type="datetime-local" name="fecha_hora" class="form-control" 
                value="{{ old('fecha_hora', $appointment->fecha_hora ?? '') }}" required>
            </div>
            
            <button type="submit" class="btn btn-primary">
                Guardar
            </button>

            <a href="{{ route('appointments.index') }}" 
            class="btn btn-secondary">
                Cancelar
            </a>

        </form>
    </div>
@endsection