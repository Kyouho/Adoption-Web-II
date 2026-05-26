@extends('layouts.admin')

@section('content')

<div style="padding: 30px;">

    <h1>🛠️ Panel de administración</h1>

    <p>Bienvenido, {{ Auth::user()->name }}.</p>

    <hr>

    <h3>📊 Resumen general</h3>

    <ul>
        <li>Animales registrados: {{ $totalAnimals }}</li>
        <li>Animales disponibles: {{ $availableAnimals }}</li>
        <li>Animales en proceso: {{ $inProcessAnimals }}</li>
        <li>Animales adoptados: {{ $adoptedAnimals }}</li>
        <li>Solicitudes totales: {{ $totalApplications }}</li>
        <li>Solicitudes pendientes: {{ $pendingApplications }}</li>
        <li>Solicitudes aprobadas: {{ $approvedApplications }}</li>
        <li>Adopciones realizadas: {{ $totalAdoptions }}</li>
        <li>Usuarios adoptantes: {{ $totalUsers }}</li>
    </ul>

    <hr>

    <h3>🚀 Accesos rápidos</h3>

    <a href="{{ route('admin.animals') }}">
        <button>Gestionar animales</button>
    </a>

    <a href="{{ route('admin.applications') }}">
        <button>Ver solicitudes</button>
    </a>

    <a href="{{ route('admin.reports') }}">
        <button>Ver reportes</button>
    </a>

    <a href="{{ route('admin.users') }}">
        <button>Ver usuarios</button>
    </a>

</div>

@endsection