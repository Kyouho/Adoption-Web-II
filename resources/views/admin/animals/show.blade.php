@extends('layouts.admin')

@section('content')

<div style="max-width:700px; margin:auto; padding:30px;">

    <h1>🐾 Detalle del animal</h1>

    <hr>

    <h2>{{ $animal->name }}</h2>

    <p>
        <strong>Tipo:</strong>
        {{ $animal->type }}
    </p>

    <p>
        <strong>Raza:</strong>
        {{ $animal->breed }}
    </p>

    <p>
        <strong>Edad:</strong>
        {{ $animal->age }}
    </p>

    <p>
        <strong>Género:</strong>
        {{ $animal->gender }}
    </p>

    <p>
        <strong>Estado:</strong>
        {{ $animal->status }}
    </p>

    <p>
        <strong>Salud:</strong>
        {{ $animal->health_status }}
    </p>

    <p>
        <strong>Vacunas:</strong>
        {{ $animal->vaccines }}
    </p>

    <hr>

    <p>{{ $animal->description }}</p>

    <a href="{{ route('admin.animals.edit', $animal->id) }}">
        <button>Editar</button>
    </a>

    <a href="{{ route('admin.animals') }}">
        <button>Volver</button>
    </a>

</div>

@endsection