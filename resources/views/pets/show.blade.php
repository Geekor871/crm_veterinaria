@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2>Detalles de la Mascota</h2>
        <p><strong>Nombre:</strong> {{ $pet->nombre }}</p>
        <p><strong>Especie:</strong> {{ $pet->especie }}</p>
        <p><strong>Raza:</strong> {{ $pet->raza }}</p>
        <p><strong>Cliente:</strong> {{ $pet->client->nombre }}</p>
    </div>
@endsection