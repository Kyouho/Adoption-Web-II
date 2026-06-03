@extends('layouts.admin')

@section('content')

<div style="padding: 1.5rem 2rem;">

  {{-- Encabezado --}}
  <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 1.5rem;">
    <div>
      <p style="font-size: 13px; color: #6b7280; margin: 0 0 2px;">Panel de administración</p>
      <h1 style="font-size: 22px; font-weight: 500; margin: 0;">Solicitudes de adopción</h1>
    </div>
    <span style="background: #f9fafb; border: 1px solid #e5e7eb; border-radius: 8px; padding: 6px 14px; font-size: 13px; color: #6b7280;">
      {{ $applications->count() }} solicitudes
    </span>
  </div>

  {{-- Lista de solicitudes --}}
  <div style="display: flex; flex-direction: column; gap: 12px;">

    @foreach($applications as $application)

      <div style="background: #fff; border: 1px solid #e5e7eb; border-radius: 12px; padding: 1rem 1.25rem;">
        <div style="display: flex; align-items: flex-start; justify-content: space-between; gap: 12px;">

          <div style="flex: 1;">
            {{-- Animal + icono --}}
            <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 10px;">
              <div style="width: 36px; height: 36px; border-radius: 50%; background: #f3f4f6; display: flex; align-items: center; justify-content: center; font-size: 18px;">
                🐾
              </div>
              <div>
                <p style="font-weight: 500; font-size: 15px; margin: 0;">{{ $application->animal->name }}</p>
                <p style="font-size: 12px; color: #9ca3af; margin: 0;">{{ $application->animal->species ?? 'Animal' }}</p>
              </div>
            </div>

            {{-- Datos en grid --}}
            <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 8px; font-size: 13px;">
              <div>
                <p style="color: #9ca3af; margin: 0 0 2px;">Solicitante</p>
                <p style="font-weight: 500; margin: 0;">{{ $application->user->name }}</p>
              </div>
              <div>
                <p style="color: #9ca3af; margin: 0 0 2px;">Fecha</p>
                <p style="margin: 0;">{{ $application->created_at->format('d M Y') }}</p>
              </div>
              <div>
                <p style="color: #9ca3af; margin: 0 0 2px;">Estado</p>
                @php
                  $badge = match($application->status) {
                    'Aprobada'  => 'background:#EAF3DE; color:#27500A;',
                    'Pendiente' => 'background:#FAEEDA; color:#633806;',
                    'Rechazada' => 'background:#FCEBEB; color:#791F1F;',
                    default     => 'background:#f3f4f6; color:#374151;',
                  };
                @endphp
                <span class="display:inline-block; {{ $badge }} font-size:12px; font-weight:500; padding:2px 10px; border-radius:6px;">
                  {{ $application->status }}
                </span>
              </div>
            </div>
          </div>

          {{-- Botón --}}
          <a href="{{ route('admin.applications.show', $application->id) }}"
             style="flex-shrink:0; display:inline-block; font-size:13px; padding:6px 14px; border:1px solid #d1d5db; border-radius:8px; color:inherit; text-decoration:none; white-space:nowrap; background:#fff;"
             onmouseover="this.style.background='#f9fafb'"
             onmouseout="this.style.background='#fff'">
            Ver detalle →
          </a>

        </div>
      </div>

    @endforeach

  </div>

</div>

@endsection
