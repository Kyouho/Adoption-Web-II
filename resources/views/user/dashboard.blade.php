@extends('layouts.user')

@section('title', 'Mi panel — PataHogar')

@section('content')

<div style="margin-bottom:2rem">
    <h1 style="font-family:'Playfair Display',serif; font-size:1.5rem; font-weight:600; color:#1a1a1a; margin:0 0 .25rem">
        Mi panel
    </h1>
    <p style="font-size:.875rem; color:#6b7280; margin:0">
        Bienvenido, <span style="font-weight:500; color:#374151">{{ Auth::user()->name }}</span>
    </p>
</div>

{{-- Stats --}}
<div style="display:grid; grid-template-columns:repeat(5,1fr); gap:1rem; margin-bottom:2rem">

    <div style="background:#f9fafb; border-radius:12px; border:.5px solid #e5e7eb; padding:1.25rem; text-align:center">
        <p style="font-family:'Playfair Display',serif; font-size:2rem; font-weight:600; color:#374151; margin:0">{{ $totalApplications }}</p>
        <p style="font-size:.75rem; color:#6b7280; margin:.25rem 0 0">Total</p>
    </div>

    <div style="background:#fefce8; border-radius:12px; border:.5px solid #e5e7eb; padding:1.25rem; text-align:center">
        <p style="font-family:'Playfair Display',serif; font-size:2rem; font-weight:600; color:#a16207; margin:0">{{ $pendingApplications }}</p>
        <p style="font-size:.75rem; color:#6b7280; margin:.25rem 0 0">Pendientes</p>
    </div>

    <div style="background:#eff6ff; border-radius:12px; border:.5px solid #e5e7eb; padding:1.25rem; text-align:center">
        <p style="font-family:'Playfair Display',serif; font-size:2rem; font-weight:600; color:#1d4ed8; margin:0">{{ $inReviewApplications }}</p>
        <p style="font-size:.75rem; color:#6b7280; margin:.25rem 0 0">En revisión</p>
    </div>

    <div style="background:#f0fdf4; border-radius:12px; border:.5px solid #e5e7eb; padding:1.25rem; text-align:center">
        <p style="font-family:'Playfair Display',serif; font-size:2rem; font-weight:600; color:#15803d; margin:0">{{ $approvedApplications }}</p>
        <p style="font-size:.75rem; color:#6b7280; margin:.25rem 0 0">Aprobadas</p>
    </div>

    <div style="background:#fef2f2; border-radius:12px; border:.5px solid #e5e7eb; padding:1.25rem; text-align:center">
        <p style="font-family:'Playfair Display',serif; font-size:2rem; font-weight:600; color:#b91c1c; margin:0">{{ $rejectedApplications }}</p>
        <p style="font-size:.75rem; color:#6b7280; margin:.25rem 0 0">Rechazadas</p>
    </div>

</div>

{{-- Accesos rápidos --}}
<div style="background:#fff; border-radius:16px; border:.5px solid #e5e7eb; overflow:hidden">
    <div style="padding:1rem 1.5rem; border-bottom:.5px solid #e5e7eb">
        <h2 style="font-size:.875rem; font-weight:500; color:#1a1a1a; margin:0">Accesos rápidos</h2>
    </div>
    <div style="padding:1rem 1.5rem; display:flex; flex-wrap:wrap; gap:.75rem">
        <a href="{{ route('animals.index') }}"
           style="display:inline-flex; align-items:center; gap:.5rem; padding:.5rem 1rem; border-radius:10px; font-size:.875rem; font-weight:500; color:#fff; background:#2d6a4f; text-decoration:none">
            <svg style="width:16px;height:16px" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
            </svg>
            Ver animales
        </a>
        <a href="{{ route('applications.index') }}"
           style="display:inline-flex; align-items:center; gap:.5rem; padding:.5rem 1rem; border-radius:10px; font-size:.875rem; font-weight:500; color:#374151; border:.5px solid #e5e7eb; text-decoration:none; background:#fff">
            <svg style="width:16px;height:16px" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
            </svg>
            Mis solicitudes
        </a>
        <a href="{{ route('profile.edit') }}"
           style="display:inline-flex; align-items:center; gap:.5rem; padding:.5rem 1rem; border-radius:10px; font-size:.875rem; font-weight:500; color:#374151; border:.5px solid #e5e7eb; text-decoration:none; background:#fff">
            <svg style="width:16px;height:16px" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
            </svg>
            Mi perfil
        </a>
    </div>
</div>

@endsection
