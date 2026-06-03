@extends('layouts.app')
@section('title', $animal->name . ' — PataHogar')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

    <div class="mb-6">
        <a href="{{ route('animals.index') }}" class="inline-flex items-center gap-1 text-sm text-gray-500 hover:text-gray-900 transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
            Volver al catálogo
        </a>
    </div>

    <div class="bg-white rounded-xl border border-gray-100 overflow-hidden">
        <div style="display:grid; grid-template-columns:320px 1fr">

            {{-- Imagen --}}
            @if($animal->image)
                <img src="{{ $animal->image }}" alt="{{ $animal->name }}"
                     style="width:320px; height:100%; min-height:380px; object-fit:cover; display:block;">
            @else
                <div style="width:320px; min-height:380px; background:#f0fdf4; display:flex; align-items:center; justify-content:center; font-size:5rem;">
                    🐾
                </div>
            @endif

            {{-- Info --}}
            <div style="padding:2rem 2.5rem 2rem 3rem; border-left:.5px solid #e5e7eb" class="flex flex-col">

                <div class="flex items-start justify-between gap-3 mb-1">
                    <h1 class="text-2xl font-semibold text-gray-900">{{ $animal->name }}</h1>
                    @if($animal->status === 'available')
                        <span class="flex-shrink-0 text-xs font-medium px-3 py-1 rounded-full bg-green-50 text-green-700 border border-green-100">Disponible</span>
                    @elseif($animal->status === 'in_process')
                        <span class="flex-shrink-0 text-xs font-medium px-3 py-1 rounded-full bg-yellow-50 text-yellow-700 border border-yellow-100">En proceso</span>
                    @else
                        <span class="flex-shrink-0 text-xs font-medium px-3 py-1 rounded-full bg-gray-100 text-gray-500 border border-gray-200">Adoptado</span>
                    @endif
                </div>

                <p class="text-sm text-gray-400 mb-6">{{ ucfirst($animal->type) }} · {{ $animal->breed ?? 'Raza no registrada' }}</p>

                <div style="display:grid; grid-template-columns:1fr 1fr; gap:.75rem" class="mb-6">
                    @foreach([
                        ['label' => 'Edad',    'value' => $animal->age . ' años'],
                        ['label' => 'Género',  'value' => $animal->gender == 'male' ? 'Macho' : 'Hembra'],
                        ['label' => 'Salud',   'value' => $animal->health_status ?? 'No registrada'],
                        ['label' => 'Vacunas', 'value' => $animal->vaccines ?? 'No registradas'],
                    ] as $field)
                    <div class="bg-gray-50 rounded-lg px-3 py-2.5">
                        <p class="text-xs text-gray-400 mb-0.5">{{ $field['label'] }}</p>
                        <p class="text-sm font-medium text-gray-700">{{ $field['value'] }}</p>
                    </div>
                    @endforeach
                </div>

                @if($animal->description)
                <div class="mb-6">
                    <p class="text-xs text-gray-400 mb-1">Descripción</p>
                    <p class="text-sm text-gray-600 leading-relaxed">{{ $animal->description }}</p>
                </div>
                @endif

                {{-- CTA --}}
                <div class="mt-auto pt-5 border-t border-gray-100">
                    @if($animal->status === 'available')
                        @auth
                            @if(Auth::user()->role === 'user')
                                <a href="{{ route('apply', $animal->id) }}"
                                   class="flex items-center justify-center gap-2 w-full py-2.5 rounded-lg text-sm font-medium text-white"
                                   style="background:#2d6a4f">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                                    </svg>
                                    Solicitar adopción
                                </a>
                            @else
                                <p class="text-xs text-gray-400 text-center">Los administradores no pueden realizar solicitudes.</p>
                            @endif
                        @else
                            <a href="{{ route('login') }}"
                               class="flex items-center justify-center w-full py-2.5 rounded-lg text-sm font-medium text-white"
                               style="background:#2d6a4f">
                                Inicia sesión para adoptar
                            </a>
                        @endauth
                    @elseif($animal->status === 'in_process')
                        <div class="flex items-center gap-2 px-4 py-3 rounded-lg bg-yellow-50 border border-yellow-100">
                            <svg class="w-4 h-4 text-yellow-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <p class="text-xs text-yellow-700 font-medium">Este animal ya tiene una solicitud en proceso.</p>
                        </div>
                    @else
                        <div class="flex items-center gap-2 px-4 py-3 rounded-lg bg-green-50 border border-green-100">
                            <svg class="w-4 h-4 text-green-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            <p class="text-xs text-green-700 font-medium">Este animal ya encontró su hogar. ❤️</p>
                        </div>
                    @endif
                </div>

            </div>
        </div>
    </div>

</div>
@endsection
