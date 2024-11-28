@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2>Detalles de la Cita</h2>

        <p><strong>Nombre de la Mascota: </strong>{{ $appointment -> pet -> nombre  }}</p>
        <p><strong>Dueño de la mascota: </strong>{{ $appointment -> pet -> client -> nombre}}</p>
        <p><strong>Motivo de la consulta: </strong>{{ $appointment -> motivo }}</p>
        <p><strong>Notas o comentarios de la consulta: </strong>{{ $appointment -> observaciones }}</p>
        <p><strong>Médico que realiza la consulta: </strong>{{ $appointment -> medico }}</p>
        <p><strong>Veterinario asignado: </strong>{{ $appointment -> veterinario }}</p>
        <p><strong>Receta prescrita: </strong>{{ $appointment -> receta }}</p>
        <p><strong>Fecha y hora de la consulta: </strong>{{ $appointment -> fecha_hora }}</p>

        <a href="{{ route('appointments.index') }}" class="btn btn-info">Regresar</a>
    </div>
@endsection