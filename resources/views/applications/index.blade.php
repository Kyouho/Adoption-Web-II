@extends('layouts.user')

@section('content')

<div class="max-w-5xl mx-auto p-6">

    <h1 class="text-2xl font-bold mb-6">📋 Mis solicitudes de adopción</h1>

    @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="mb-4 p-3 bg-red-100 text-red-700 rounded">
            {{ session('error') }}
        </div>
    @endif

    @forelse($applications as $application)

        <div class="bg-white shadow rounded p-5 mb-4">

            <h2 class="text-xl font-semibold">
                {{ $application->animal->name }}
            </h2>

            <p>
                <strong>Tipo:</strong>
                {{ $application->animal->type }}
            </p>

            <p>
                <strong>Estado de la solicitud:</strong>

                @if($application->status === 'pending')
                    Pendiente
                @elseif($application->status === 'in_review')
                    En revisión
                @elseif($application->status === 'approved')
                    Aprobada
                @elseif($application->status === 'rejected')
                    Rechazada
                @endif
            </p>

            <p>
                <strong>Fecha:</strong>
                {{ $application->created_at->format('d/m/Y') }}
            </p>

            <a href="{{ route('applications.show', $application->id) }}">
                <button class="mt-3 px-4 py-2 bg-blue-600 text-white rounded">
                    Ver detalle
                </button>
            </a>

        </div>

    @empty

        <div class="bg-white shadow rounded p-6 text-center">
            <p>No tienes solicitudes de adopción registradas.</p>

            <a href="{{ route('animals.index') }}">
                <button class="mt-4 px-4 py-2 bg-blue-600 text-white rounded">
                    Ver animales disponibles
                </button>
            </a>
        </div>

    @endforelse

</div>

@endsection