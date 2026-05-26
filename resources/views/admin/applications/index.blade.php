@extends('layouts.admin')

@section('content')

<div style="padding:30px;">

    <h1>📋 Solicitudes de adopción</h1>

    <hr>

    @foreach($applications as $application)

        <div style="border:1px solid #ccc; padding:15px; margin-bottom:15px;">

            <h3>
                🐾 {{ $application->animal->name }}
            </h3>

            <p>
                <strong>Solicitante:</strong>
                {{ $application->user->name }}
            </p>

            <p>
                <strong>Estado:</strong>
                {{ $application->status }}
            </p>

            <p>
                <strong>Fecha:</strong>
                {{ $application->created_at }}
            </p>

            <a href="{{ route('admin.applications.show', $application->id) }}">
                <button>Ver detalle</button>
            </a>

        </div>

    @endforeach

</div>

@endsection