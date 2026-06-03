@extends('layouts.admin')

@section('content')

<div style="padding: 1.5rem 2rem;">

    {{-- Header --}}
    <div style="margin-bottom: 2rem;">
        <p style="font-size: 12px; font-weight: 500; color: #888; letter-spacing: 0.08em; text-transform: uppercase; margin: 0 0 6px;">
            Panel administrativo
        </p>
        <h1 style="font-size: 22px; font-weight: 500; margin: 0;">
            Reportes del sistema
        </h1>
    </div>

    {{-- Métricas --}}
    <p style="font-size: 12px; font-weight: 500; color: #aaa; letter-spacing: 0.08em; text-transform: uppercase; margin: 0 0 12px;">
        Resumen general
    </p>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(140px, 1fr)); gap: 12px; margin-bottom: 2rem;">

        <div style="background: #f5f5f3; border-radius: 8px; padding: 1rem;">
            <p style="font-size: 12px; color: #888; margin: 0 0 8px;">🐾 Animales</p>
            <span style="font-size: 24px; font-weight: 500;">{{ $totalAnimals }}</span>
        </div>

        <div style="background: #f5f5f3; border-radius: 8px; padding: 1rem;">
            <p style="font-size: 12px; color: #888; margin: 0 0 8px;">📄 Solicitudes</p>
            <span style="font-size: 24px; font-weight: 500;">{{ $totalApplications }}</span>
        </div>

        <div style="background: #f5f5f3; border-radius: 8px; padding: 1rem;">
            <p style="font-size: 12px; color: #888; margin: 0 0 8px;">🤝 Adopciones</p>
            <span style="font-size: 24px; font-weight: 500;">{{ $totalAdoptions }}</span>
        </div>

    </div>

    {{-- Acciones --}}
    <p style="font-size: 12px; font-weight: 500; color: #aaa; letter-spacing: 0.08em; text-transform: uppercase; margin: 0 0 12px;">
        Acciones rápidas
    </p>

    <div style="display: flex; flex-wrap: wrap; gap: 10px;">

        <a href="{{ route('admin.reports.adoptions') }}" style="text-decoration: none;">
            <button style="display: inline-flex; align-items: center; gap: 8px; padding: 0 16px; height: 36px; font-size: 14px; border: 1px solid #ddd; background: #fff; border-radius: 8px; cursor: pointer;">
                📊 Reporte de adopciones
            </button>
        </a>

        <a href="{{ route('admin.stats') }}" style="text-decoration: none;">
            <button style="display: inline-flex; align-items: center; gap: 8px; padding: 0 16px; height: 36px; font-size: 14px; border: 1px solid #ddd; background: #fff; border-radius: 8px; cursor: pointer;">
                📈 Ver estadísticas
            </button>
        </a>

    </div>

</div>

@endsection
