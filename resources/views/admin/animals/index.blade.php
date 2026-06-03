@extends('layouts.admin')

@section('page-title', 'Animales')
@section('page-subtitle', 'Gestión del catálogo de animales')

@section('header-actions')
    <a href="{{ route('admin.animals.create') }}">
        <button>➕ Registrar animal</button>
    </a>
@endsection

@section('content')

<div style="display:grid; grid-template-columns:repeat(4,1fr); gap:1rem">
    @foreach($animals as $animal)

    <div style="background:#fff; border-radius:12px; border:.5px solid #e5e7eb; overflow:hidden">

        @if($animal->image)
            <img src="{{ $animal->image }}"
                 alt="{{ $animal->name }}"
                 style="width:100%; height:300px; object-fit:cover; display:block">
        @else
            <div style="width:100%; height:300px; background:#f0fdf4; display:flex; align-items:center; justify-content:center; font-size:2.5rem">
                🐾
            </div>
        @endif

        <div style="padding:.875rem 1rem">

            <div style="display:flex; align-items:center; justify-content:space-between; gap:.5rem; margin-bottom:.25rem">
                <p style="font-size:.9375rem; font-weight:500; color:#1a1a1a; margin:0; white-space:nowrap; overflow:hidden; text-overflow:ellipsis">
                    {{ $animal->name }}
                </p>
                @if($animal->status === 'available')
                    <span style="flex-shrink:0; font-size:.6875rem; font-weight:500; padding:2px 8px; border-radius:20px; background:#f0fdf4; color:#15803d; border:.5px solid #bbf7d0">
                        Disponible
                    </span>
                @elseif($animal->status === 'in_process')
                    <span style="flex-shrink:0; font-size:.6875rem; font-weight:500; padding:2px 8px; border-radius:20px; background:#fefce8; color:#a16207; border:.5px solid #fde68a">
                        En proceso
                    </span>
                @else
                    <span style="flex-shrink:0; font-size:.6875rem; font-weight:500; padding:2px 8px; border-radius:20px; background:#f9fafb; color:#6b7280; border:.5px solid #e5e7eb">
                        Adoptado
                    </span>
                @endif
            </div>

            <p style="font-size:.8125rem; color:#6b7280; margin:0 0 .875rem">{{ $animal->type }}</p>

            <div style="display:flex; gap:.5rem">
                <a href="{{ route('admin.animals.show', $animal->id) }}"
                   style="flex:1; text-align:center; padding:6px 0; border-radius:8px; font-size:.8125rem; font-weight:500; color:#374151; border:.5px solid #e5e7eb; text-decoration:none; background:#fff">
                    Ver
                </a>
                <a href="{{ route('admin.animals.edit', $animal->id) }}"
                   style="flex:1; text-align:center; padding:6px 0; border-radius:8px; font-size:.8125rem; font-weight:500; color:#fff; text-decoration:none; background:#2d6a4f">
                    Editar
                </a>
                <form method="POST" action="{{ route('admin.animals.destroy', $animal->id) }}"
                      onsubmit="return confirm('¿Eliminar a {{ $animal->name }}?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            style="padding:6px 10px; border-radius:8px; font-size:.8125rem; font-weight:500; color:#fff; background:#ef4444; border:none; cursor:pointer">
                        <svg style="width:14px;height:14px;display:block" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                        </svg>
                    </button>
                </form>
            </div>

        </div>
    </div>

    @endforeach

    @if($animals->isEmpty())
    <div style="grid-column:1/-1; background:#fff; border-radius:16px; border:.5px solid #e5e7eb; padding:4rem 2rem; text-align:center">
        <div style="font-size:3rem; margin-bottom:1rem">🐾</div>
        <p style="font-size:.9375rem; font-weight:500; color:#1a1a1a; margin:0 0 .25rem">Sin animales registrados</p>
        <p style="font-size:.875rem; color:#6b7280; margin:0 0 1.5rem">Añade el primer animal al sistema.</p>
        <a href="{{ route('admin.animals.create') }}"
           style="display:inline-block; padding:.625rem 1.5rem; border-radius:10px; font-size:.875rem; font-weight:500; color:#fff; background:#2d6a4f; text-decoration:none">
            + Registrar animal
        </a>
    </div>
    @endif
</div>

@endsection
