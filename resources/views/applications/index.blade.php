@extends('layouts.user')

@section('title', 'Mis solicitudes — PataHogar')

@section('content')

<div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:2rem">
    <div>
        <h1 style="font-family:'Playfair Display',serif; font-size:1.5rem; font-weight:600; color:#1a1a1a; margin:0 0 .25rem">
            Mis solicitudes
        </h1>
        <p style="font-size:.875rem; color:#6b7280; margin:0">Seguimiento de tus solicitudes de adopción</p>
    </div>
    <a href="{{ route('animals.index') }}"
       style="display:inline-block; padding:.5rem 1.25rem; border-radius:10px; font-size:.875rem; font-weight:500; color:#fff; background:#2d6a4f; text-decoration:none">
        + Adoptar animal
    </a>
</div>

@forelse($applications as $application)
    @php
        $statusMap = [
            'pending'   => ['label' => 'Pendiente',   'bg' => '#fefce8', 'color' => '#a16207', 'border' => '#fde68a'],
            'in_review' => ['label' => 'En revisión', 'bg' => '#eff6ff', 'color' => '#1d4ed8', 'border' => '#bfdbfe'],
            'approved'  => ['label' => 'Aprobada',    'bg' => '#f0fdf4', 'color' => '#15803d', 'border' => '#bbf7d0'],
            'rejected'  => ['label' => 'Rechazada',   'bg' => '#fef2f2', 'color' => '#b91c1c', 'border' => '#fecaca'],
        ];
        $status = $statusMap[$application->status] ?? ['label' => $application->status, 'bg' => '#f9fafb', 'color' => '#374151', 'border' => '#e5e7eb'];
    @endphp

    <div style="background:#fff; border-radius:12px; border:.5px solid #e5e7eb; padding:1.25rem 1.5rem; margin-bottom:.75rem; display:flex; align-items:center; justify-content:space-between; gap:1rem">
        <div style="display:flex; align-items:center; gap:1rem">
            <div style="width:40px; height:40px; border-radius:50%; background:#f0fdf4; display:flex; align-items:center; justify-content:center; flex-shrink:0">
                <svg style="width:18px;height:18px;stroke:#2d6a4f" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                </svg>
            </div>
            <div>
                <p style="font-size:.9375rem; font-weight:500; color:#1a1a1a; margin:0">{{ $application->animal->name }}</p>
                <p style="font-size:.8125rem; color:#6b7280; margin:.125rem 0 0">{{ $application->animal->type }} · {{ $application->created_at->format('d/m/Y') }}</p>
            </div>
        </div>

        <div style="display:flex; align-items:center; gap:.75rem; flex-shrink:0">
            <span class="background:{{ $status['bg'] }}; color:{{ $status['color'] }}; border:.5px solid {{ $status['border'] }}; font-size:.75rem; font-weight:500; padding:3px 10px; border-radius:20px">
                {{ $status['label'] }}
            </span>
            <a href="{{ route('applications.show', $application->id) }}"
               style="font-size:.8125rem; font-weight:500; color:#6b7280; border:.5px solid #e5e7eb; padding:6px 14px; border-radius:8px; text-decoration:none; background:#fff">
                Ver detalle
            </a>
        </div>
    </div>

@empty

    <div style="background:#fff; border-radius:16px; border:.5px solid #e5e7eb; padding:4rem 2rem; text-align:center">
        <div style="width:56px; height:56px; background:#f0fdf4; border-radius:50%; display:flex; align-items:center; justify-content:center; margin:0 auto 1rem">
            <svg style="width:26px;height:26px;stroke:#2d6a4f" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
            </svg>
        </div>
        <p style="font-size:.9375rem; font-weight:500; color:#1a1a1a; margin:0 0 .25rem">Sin solicitudes aún</p>
        <p style="font-size:.875rem; color:#6b7280; margin:0 0 1.5rem">Explora los animales disponibles y envía tu primera solicitud.</p>
        <a href="{{ route('animals.index') }}"
           style="display:inline-block; padding:.625rem 1.5rem; border-radius:10px; font-size:.875rem; font-weight:500; color:#fff; background:#2d6a4f; text-decoration:none">
            Ver animales disponibles
        </a>
    </div>

@endforelse

@endsection
