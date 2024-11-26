@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Añadir Nueva Cita</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('appointments.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="motivo">Motivo de la cita</label>
                <input type="text" name="motivo" class="form-control" 
                value="{{ old('motivo') }}"required>
            </div>

            <div class="form-group">
                <label for="Veterinario">Veterinario</label>
                <input type="text" name="veterinario" class="form-control" 
                value="{{ old('veterinario') }}" required>
            </div>

        </form>
    </div>
@endsection