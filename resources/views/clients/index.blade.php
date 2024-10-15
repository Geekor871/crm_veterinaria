@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Clientes</h1>
    <a href="{{ route('clients.create') }}" class="btn btn-primary">Agregar Cliente</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Teléfono</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clients as $client)
                <tr>
                    <td>{{ $client->id }}</td>
                    <td>{{ $client->nombre }}</td>
                    <td>{{ $client->telefono }}</td>
                    <td>{{ $client->email }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
