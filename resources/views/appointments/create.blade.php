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

        <form action="{{ route('') }}" method="post"></form>
    </div>
@endsection