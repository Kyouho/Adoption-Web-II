@extends('layouts.app')

@section('content')

<div style="max-width: 800px; margin: auto; padding: 30px;">

    <h1>🐾 Información del animal</h1>

    <hr>

    @if($animal->image)
        <img 
            src="{{ $animal->image }}" 
            alt="{{ $animal->name }}" 
            style="width: 300px; height: 220px; object-fit: cover; border-radius: 10px;"
        >
    @else
        <img 
            src="https://placehold.co/600x400?text=Sin+foto" 
            alt="Sin foto" 
            style="width: 300px; height: 220px; object-fit: cover; border-radius: 10px;"
        >
    @endif

    <h2>{{ $animal->name }}</h2>

    <p><strong>Tipo:</strong> {{ $animal->type }}</p>
    <p><strong>Raza:</strong> {{ $animal->breed ?? 'No registrada' }}</p>
    <p><strong>Edad:</strong> {{ $animal->age }} años</p>
    <p><strong>Género:</strong> {{ $animal->gender == 'male' ? 'Macho' : 'Hembra' }}</p>
    <p><strong>Salud:</strong> {{ $animal->health_status ?? 'No registrada' }}</p>
    <p><strong>Vacunas:</strong> {{ $animal->vaccines ?? 'No registradas' }}</p>
    <p><strong>Descripción:</strong> {{ $animal->description ?? 'Sin descripción' }}</p>

    <p>
        <strong>Estado:</strong>

        @if($animal->status === 'available')
            Disponible
        @elseif($animal->status === 'in_process')
            En proceso
        @else
            Adoptado
        @endif
    </p>

    <hr>

    @if($animal->status === 'available')

        @auth
            @if(Auth::user()->role === 'user')
                <a href="{{ route('apply', $animal->id) }}">
                    <button>Solicitar adopción</button>
                </a>
            @else
                <p>Los administradores no pueden realizar solicitudes de adopción.</p>
            @endif
        @else
            <a href="{{ route('login') }}">
                <button>Inicia sesión para solicitar adopción</button>
            </a>
        @endauth

    @elseif($animal->status === 'in_process')
        <p style="color: orange;">
            Este animal ya tiene una solicitud en proceso.
        </p>
    @else
        <p style="color: green;">
            Este animal ya fue adoptado.
        </p>
    @endif

    <br><br>

    <a href="{{ route('animals.index') }}">
        <button>Volver al catálogo</button>
    </a>

</div>

@endsection