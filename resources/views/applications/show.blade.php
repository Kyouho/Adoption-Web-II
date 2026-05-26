@extends('layouts.user')

@section('content')

<div style="max-width:700px; margin:auto; padding:30px;">

    <h1>📄 Detalle de solicitud</h1>

    <hr>

    <h3>🐾 Animal</h3>

    <p>
        {{ $application->animal->name }}
    </p>

    <hr>

    <h3>👤 Solicitante</h3>

    <p>
        {{ $application->user->name }}
    </p>

    <p>
        {{ $application->user->email }}
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

    <h3>📊 Estado</h3>

    <p>
        {{ $application->status }}
    </p>

</div>

@endsection