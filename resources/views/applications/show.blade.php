@extends('layouts.user')

@section('content')

@php
  $badge = match($application->status) {
    'approved' => 'background:#dcfce7;color:rgb(21 128 61);',
    'pending'  => 'background:#fef3c7;color:#92400e;',
    'rejected' => 'background:#fee2e2;color:#b91c1c;',
    default    => 'background:#f3f4f6;color:#374151;',
  };

  $badgeStyle = "margin-left:auto;display:inline-block;{$badge}font-size:12px;font-weight:500;padding:3px 12px;border-radius:6px;";
@endphp

<div style="max-width: 700px; margin: 2rem auto; padding: 0 1rem;">

  <p style="font-size: 13px; color: #9ca3af; margin: 0 0 4px;">Panel de usuario</p>
  <h1 style="font-size: 22px; font-weight: 500; margin: 0 0 1.5rem;">Detalle de solicitud</h1>

  <div style="background: #fff; border: 1px solid #e5e7eb; border-radius: 12px; overflow: hidden;">

    {{-- Encabezado: animal + estado --}}
    <div style="padding: 1.25rem; display: flex; align-items: center; gap: 12px; border-bottom: 1px solid #e5e7eb;">
      @php
    $animalImage = $application->animal->image;
@endphp

@if($animalImage)
    <img
        src="{{ $animalImage }}"
        alt="{{ $application->animal->name }}"
        style="width:44px;height:44px;border-radius:50%;object-fit:cover;border:1px solid #e5e7eb;flex-shrink:0;">
@else
    <div style="width:44px;height:44px;border-radius:50%;background:#f3f4f6;display:flex;align-items:center;justify-content:center;font-size:22px;">
        🐾
    </div>
@endif
      <div>
        <p style="font-weight: 500; font-size: 16px; margin: 0;">{{ $application->animal->name }}</p>
        <p style="font-size: 12px; color: #9ca3af; margin: 0;">{{ $application->animal->species ?? 'Animal' }}</p>
      </div>

      <span style="margin-left: auto; display: inline-block; {{ $badge }} font-size: 12px; font-weight: 500; padding: 3px 12px; border-radius: 6px;">
        {{ $application->status }}
      </span>
    </div>

    {{-- Solicitante + Vivienda --}}
    <div style="display: grid; grid-template-columns: 1fr 1fr; border-bottom: 1px solid #e5e7eb;">
      <div style="padding: 1rem 1.25rem; border-right: 1px solid #e5e7eb;">
        <p style="font-size: 12px; color: #9ca3af; margin: 0 0 4px;">Solicitante</p>
        <p style="font-weight: 500; font-size: 14px; margin: 0;">{{ $application->user->name }}</p>
        <p style="font-size: 13px; color: #6b7280; margin: 2px 0 0;">{{ $application->user->email }}</p>
      </div>
      <div style="padding: 1rem 1.25rem;">
        <p style="font-size: 12px; color: #9ca3af; margin: 0 0 4px;">Tipo de vivienda</p>
        <p style="font-weight: 500; font-size: 14px; margin: 0;">{{ $application->housing_type }}</p>
      </div>
    </div>

    {{-- Experiencia --}}
    <div style="padding: 1rem 1.25rem; border-bottom: 1px solid #e5e7eb;">
      <p style="font-size: 12px; color: #9ca3af; margin: 0 0 6px;">Experiencia con mascotas</p>
      <p style="font-size: 14px; margin: 0; color: #111827; line-height: 1.6;">{{ $application->experience_with_pets }}</p>
    </div>

    {{-- Motivación --}}
    <div style="padding: 1rem 1.25rem;">
      <p style="font-size: 12px; color: #9ca3af; margin: 0 0 6px;">Motivación</p>
      <p style="font-size: 14px; margin: 0; color: #111827; line-height: 1.6;">{{ $application->motivation }}</p>
    </div>

  </div>

</div>

@endsection
