@extends('layouts.admin')

@section('content')

<div style="padding:30px;">

    <h1>📊 Reportes del sistema</h1>

    <hr>

    <h3>📌 Resumen general</h3>

    <ul>
        <li>
            Animales registrados:
            {{ $totalAnimals }}
        </li>

        <li>
            Solicitudes:
            {{ $totalApplications }}
        </li>

        <li>
            Adopciones:
            {{ $totalAdoptions }}
        </li>
    </ul>

    <hr>

    <a href="{{ route('admin.reports.adoptions') }}">
        <button>Ver reporte de adopciones</button>
    </a>

    <a href="{{ route('admin.stats') }}">
        <button>Ver estadísticas</button>
    </a>

</div>

@endsection