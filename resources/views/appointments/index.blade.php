@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Citas y Consultas</h1>

        <a href="{{route('appointments.create')}}" class="btn btn-primary">Agregar Cita</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Fecha y hora</th>
                    <th>Mascota</th>
                    <th>Dueño de la Mascota</th>
                    <th>Motivo de la Consulta</th>
                    <th>Observaciones</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($appointment as $cita)
                    <tr>
                        <td>{{ $cita -> fecha_hora }}</td>
                        <td>{{ $cita -> pet -> nombre }}</td>
                        <td>{{ $cita -> pet -> client -> nombre }}</td>
                        <td>{{ $cita -> motivo }}</td>
                        <td>{{ $cita -> observaciones }}</td>
                        <td>
                            <a href="{{ route('appointments.show', $cita -> id) }}" class="btn btn-info btn-sm">Ver</a>
                            <a href="{{ route('appointments.edit', $cita -> id) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('appointments.destroy', $cita -> id) }}"
                                method="POST" style="display:inline;">

                                @csrf
                                @method('DElETE')
                                <button type="submit" 
                                class="btn btn-danger btn-sm" 
                                onclick="return confirm('¿Estás seguro que quieres eliminar esta cita?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection