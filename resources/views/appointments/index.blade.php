@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Citas y Consultas</h1>

        <a href="{{route('appointments.create')}}" class="btn btn-primary">Agregar Cita</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Fecha y hora</th>
                    <th>Motivo</th>
                    <th>Observaciones</th>
                    <th>Mascota</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($appointment as $cita)
                    <tr>
                        <td>{{$cita -> fecha_hora}}</td>
                        <td>{{$cita -> motivo}}</td>
                        <td>{{$cita -> observaciones}}</td>
                        <td>{{$cita -> pet -> nombre}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection