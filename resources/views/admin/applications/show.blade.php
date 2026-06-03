@extends('layouts.admin')

@section('content')

@php
  $badge = match($application->status) {
    'approved'  => 'background:#EAF3DE; color:#27500A;',
    'pending'   => 'background:#FAEEDA; color:#633806;',
    'rejected'  => 'background:#FCEBEB; color:#791F1F;',
    default     => 'background:#f3f4f6; color:#374151;',
  };

  $labels = [
    'approved' => 'Aprobada',
    'pending'  => 'Pendiente',
    'rejected' => 'Rechazada',
  ];
  $statusLabel = $labels[$application->status] ?? $application->status;
@endphp

<div style="max-width: 700px; margin: 2rem auto; padding: 0 1rem;">

  {{-- Encabezado --}}
  <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 1.5rem;">
    <div>
      <p style="font-size: 13px; color: #9ca3af; margin: 0 0 2px;">Panel de administración</p>
      <h1 style="font-size: 22px; font-weight: 500; margin: 0;">Revisión de solicitud</h1>
    </div>
    <a href="{{ route('admin.applications') }}"
       style="font-size: 13px; padding: 6px 14px; border: 1px solid #d1d5db; border-radius: 8px; color: inherit; text-decoration: none; display: flex; align-items: center; gap: 6px; background: #fff;"
       onmouseover="this.style.background='#f9fafb'"
       onmouseout="this.style.background='#fff'">
      ← Volver
    </a>
  </div>

  <div style="background: #fff; border: 1px solid #e5e7eb; border-radius: 12px; overflow: hidden;">

    {{-- Animal --}}
    <div style="padding: 1.25rem; display: flex; align-items: center; gap: 12px; border-bottom: 1px solid #e5e7eb;">
      @if($application->animal->image)
    <img src="{{ $application->animal->image }}"
         alt="{{ $application->animal->name }}"
         style="width:56px; height:56px; border-radius:10px; object-fit:cover; flex-shrink:0; border:1px solid #e5e7eb;">
@else
    <div style="width:56px; height:56px; border-radius:10px; background:#f3f4f6; display:flex; align-items:center; justify-content:center; font-size:26px; flex-shrink:0;">
        🐾
    </div>
@endif
      <div>
        <p style="font-weight: 500; font-size: 16px; margin: 0;">{{ $application->animal->name }}</p>
        <p style="font-size: 13px; color: #9ca3af; margin: 0;">{{ $application->animal->type }}</p>
      </div>
      <span style="margin-left: auto; display: inline-block; {{ $badge }} font-size: 12px; font-weight: 500; padding: 3px 12px; border-radius: 6px;">
        {{ $statusLabel }}
      </span>
    </div>

    {{-- Solicitante --}}
    <div style="padding: 1rem 1.25rem; border-bottom: 1px solid #e5e7eb;">
      <p style="font-size: 11px; color: #9ca3af; font-weight: 500; text-transform: uppercase; letter-spacing: 0.05em; margin: 0 0 10px;">Solicitante</p>
      <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px; font-size: 13px;">
        <div>
          <p style="color: #9ca3af; margin: 0 0 2px;">Nombre</p>
          <p style="font-weight: 500; margin: 0;">{{ $application->user->name }}</p>
        </div>
        <div>
          <p style="color: #9ca3af; margin: 0 0 2px;">Correo</p>
          <p style="font-weight: 500; margin: 0;">{{ $application->user->email }}</p>
        </div>
        <div>
          <p style="color: #9ca3af; margin: 0 0 2px;">Teléfono</p>
          <p style="font-weight: 500; margin: 0;">{{ $application->user->phone }}</p>
        </div>
        <div>
          <p style="color: #9ca3af; margin: 0 0 2px;">Dirección</p>
          <p style="font-weight: 500; margin: 0;">{{ $application->user->address }}</p>
        </div>
      </div>
    </div>

    {{-- Vivienda --}}
    <div style="padding: 1rem 1.25rem; border-bottom: 1px solid #e5e7eb;">
      <p style="font-size: 11px; color: #9ca3af; font-weight: 500; text-transform: uppercase; letter-spacing: 0.05em; margin: 0 0 4px;">Vivienda</p>
      <p style="font-size: 14px; margin: 0; color: #111827;">{{ $application->housing_type }}</p>
    </div>

    {{-- Experiencia --}}
    <div style="padding: 1rem 1.25rem; border-bottom: 1px solid #e5e7eb;">
      <p style="font-size: 11px; color: #9ca3af; font-weight: 500; text-transform: uppercase; letter-spacing: 0.05em; margin: 0 0 6px;">Experiencia con mascotas</p>
      <p style="font-size: 14px; margin: 0; color: #111827; line-height: 1.6;">{{ $application->experience_with_pets }}</p>
    </div>

    {{-- Motivación --}}
    <div style="padding: 1rem 1.25rem; border-bottom: 1px solid #e5e7eb;">
      <p style="font-size: 11px; color: #9ca3af; font-weight: 500; text-transform: uppercase; letter-spacing: 0.05em; margin: 0 0 6px;">Motivación</p>
      <p style="font-size: 14px; margin: 0; color: #111827; line-height: 1.6;">{{ $application->motivation }}</p>
    </div>

    {{-- Acciones --}}
    @if($application->status !== 'approved' && $application->status !== 'rejected')
    <div style="padding: 1rem 1.25rem; background: #f9fafb; display: flex; align-items: center; gap: 10px; flex-wrap: wrap;">
      <p style="font-size: 13px; color: #6b7280; margin: 0; flex: 1;">¿Qué decisión tomas sobre esta solicitud?</p>

      <form method="POST" action="{{ route('admin.applications.approve', $application->id) }}" style="margin: 0;">
        @csrf
        <button type="submit"
        style="font-size:13px;
               padding:7px 18px;
               cursor:pointer;
               background:#dcfce7;
               color:rgb(21 128 61);
               border:1px solid #86efac;
               border-radius:8px;
               font-weight:500;">
    ✓ Aprobar
</button>
      </form>

      <form method="POST" action="{{ route('admin.applications.reject', $application->id) }}" style="margin: 0;">
        @csrf
        <button type="submit"
                style="font-size: 13px; padding: 7px 18px; cursor: pointer; background: #FCEBEB; color: #791F1F; border: 1px solid #F7C1C1; border-radius: 8px; font-weight: 500;">
          ✕ Rechazar
        </button>
      </form>
    </div>
    @endif

  </div>

</div>

@endsection
