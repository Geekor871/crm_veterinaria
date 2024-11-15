@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Citas y Consultas</h1>

        <a href="{{route('appointments.create')}}" class="btn btn-primary">Agregar Cita</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Motivo</th>
                    <th>Observaciones</th>
                    <th>Mascota</th>
                </tr>
            </thead>
        </table>
    </div>
@endsection