@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Inventario</h1>
    <a href="{{ route('inventories.create') }}" class="btn btn-primary">Agregar Producto</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio Unitario</th>
                <th>Fecha de Expiración</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($inventories as $inventory)
                <tr>
                    <td>{{ $inventory->id }}</td>
                    <td>{{ $inventory->producto }}</td>
                    <td>{{ $inventory->cantidad }}</td>
                    <td>{{ $inventory->precio_unitario }}</td>
                    <td>{{ $inventory->fecha_expiracion }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection