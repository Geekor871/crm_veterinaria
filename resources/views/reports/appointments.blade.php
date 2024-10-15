@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Reporte de Citas</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>Mascota</th>
                <th>Fecha y Hora</th>
                <th>Motivo</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($appointments as $appointment)
                <tr>
                    <td>{{ $appointment->id }}</td>
                    <td>{{ $appointment->pet->client->nombre }}</td>
                    <td>{{ $appointment->pet->nombre }}</td>
                    <td>{{ $appointment->fecha_hora }}</td>
                    <td>{{ $appointment->motivo }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
