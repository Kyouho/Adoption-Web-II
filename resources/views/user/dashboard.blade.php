@extends('layouts.user')

@section('content')

<div style="padding: 30px;">

    <h1>👤 Dashboard</h1>

    <p>Bienvenido, {{ Auth::user()->name }}.</p>

    <hr>

    <h3>📊 Resumen de solicitudes</h3>

    <ul>
        <li>Total de solicitudes: {{ $totalApplications }}</li>
        <li>Pendientes: {{ $pendingApplications }}</li>
        <li>En revisión: {{ $inReviewApplications }}</li>
        <li>Aprobadas: {{ $approvedApplications }}</li>
        <li>Rechazadas: {{ $rejectedApplications }}</li>
    </ul>

    <hr>

    <h3>🚀 Accesos rápidos</h3>

    <a href="{{ route('animals.index') }}">
        <button>Ver animales</button>
    </a>

    <a href="{{ route('applications.index') }}">
        <button>Mis solicitudes</button>
    </a>

    <a href="{{ route('profile.edit') }}">
        <button>Mi perfil</button>
    </a>

</div>

@endsection