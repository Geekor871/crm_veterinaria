@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Mascotas</h1>
    <a href="{{ route('pets.create') }}" class="btn btn-primary">Agregar Mascota</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Especie</th>
                <th>Raza</th>
                <th>Cliente</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pets as $pet)
                <tr>
                    <td>{{ $pet->id }}</td>
                    <td>{{ $pet->nombre }}</td>
                    <td>{{ $pet->especie }}</td>
                    <td>{{ $pet->raza }}</td>
                    <td>{{ $pet->client->nombre}}</td>
                    <td>
                        <a href="{{ route('pets.show', $pet->id) }}" 
                        class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('pets.edit', $pet->id) }}" 
                        class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('pets.destroy', $pet->id) }}" 
                        method="POST"  style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                            onclick="return confirm('Estas seguro que quieres eliminar esta mascota?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection