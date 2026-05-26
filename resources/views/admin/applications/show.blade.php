@extends('layouts.admin')

@section('content')

<div style="max-width:700px; margin:auto; padding:30px;">

    <h1>📄 Revisión de solicitud</h1>

    <hr>

    <h3>🐾 Animal</h3>

    <p>
        <strong>Nombre:</strong>
        {{ $application->animal->name }}
    </p>

    <p>
        <strong>Tipo:</strong>
        {{ $application->animal->type }}
    </p>

    <hr>

    <h3>👤 Solicitante</h3>

    <p>
        <strong>Nombre:</strong>
        {{ $application->user->name }}
    </p>

    <p>
        <strong>Correo:</strong>
        {{ $application->user->email }}
    </p>

    <p>
        <strong>Teléfono:</strong>
        {{ $application->user->phone }}
    </p>

    <p>
        <strong>Dirección:</strong>
        {{ $application->user->address }}
    </p>

    <hr>

    <h3>🏠 Vivienda</h3>

    <p>
        {{ $application->housing_type }}
    </p>

    <hr>

    <h3>🐶 Experiencia</h3>

    <p>
        {{ $application->experience_with_pets }}
    </p>

    <hr>

    <h3>❤️ Motivación</h3>

    <p>
        {{ $application->motivation }}
    </p>

    <hr>

    <h3>📊 Estado actual</h3>

    <p>
        {{ $application->status }}
    </p>

    <hr>

   @if(
    $application->status !== 'approved'
    &&
    $application->status !== 'rejected'
)

<form method="POST"
      action="{{ route(
        'admin.applications.approve',
        $application->id
      ) }}">

    @csrf

    <button
        type="submit"
        style="background:green; color:white;">

        Aprobar

    </button>

</form>

<br>

<form method="POST"
      action="{{ route(
        'admin.applications.reject',
        $application->id
      ) }}">

    @csrf

    <button
        type="submit"
        style="background:red; color:white;">

        Rechazar

    </button>

</form>

@endif

    <br><br>

    <a href="{{ route('admin.applications') }}">
        <button>Volver</button>
    </a>

</div>

@endsection