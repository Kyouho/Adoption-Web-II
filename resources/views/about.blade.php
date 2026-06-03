@extends('layouts.app')

@section('title', 'Nosotros — PataHogar')

@section('content')
<div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

    {{-- Header --}}
    <div class="mb-10">
        <span style="display:inline-block; background:#d8f3dc; color:#2d6a4f; font-size:.75rem; font-weight:500; padding:4px 12px; border-radius:20px; margin-bottom:1rem">
            Nuestra historia
        </span>
        <h1 class="font-serif text-3xl font-semibold text-gray-900 mb-3">
            Conectamos animales<br>con hogares llenos de amor
        </h1>
        <p class="text-gray-500 leading-relaxed" style="max-width:560px">
            Este sistema fue desarrollado para facilitar el proceso de adopción, conectando personas con fundaciones que rescatan y cuidan animales en situación de abandono.
        </p>
    </div>

    {{-- Misión y Visión --}}
    <div style="display:grid; grid-template-columns:1fr 1fr; gap:1.25rem" class="mb-8">
        <div class="bg-white rounded-xl border border-gray-100 p-6">
            <div style="width:36px; height:36px; background:#d8f3dc; border-radius:10px; display:flex; align-items:center; justify-content:center; margin-bottom:1rem">
                <svg style="width:18px;height:18px;stroke:#2d6a4f" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                </svg>
            </div>
            <h3 class="font-serif text-base font-semibold text-gray-900 mb-2">Misión</h3>
            <p class="text-sm text-gray-500 leading-relaxed">
                Promover la adopción responsable y brindar una plataforma que facilite la gestión de animales y solicitudes de adopción.
            </p>
        </div>
        <div class="bg-white rounded-xl border border-gray-100 p-6">
            <div style="width:36px; height:36px; background:#d8f3dc; border-radius:10px; display:flex; align-items:center; justify-content:center; margin-bottom:1rem">
                <svg style="width:18px;height:18px;stroke:#2d6a4f" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                </svg>
            </div>
            <h3 class="font-serif text-base font-semibold text-gray-900 mb-2">Visión</h3>
            <p class="text-sm text-gray-500 leading-relaxed">
                Convertirnos en la herramienta clave para fundaciones y adoptantes, contribuyendo a reducir el abandono animal.
            </p>
        </div>
    </div>

    {{-- Qué puedes hacer --}}
    <div class="bg-white rounded-xl border border-gray-100 p-6 mb-8">
        <h3 class="font-serif text-base font-semibold text-gray-900 mb-4">¿Qué puedes hacer aquí?</h3>
        <div class="flex flex-col gap-3">
            @foreach([
                ['icon' => 'M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z', 'text' => 'Ver animales disponibles para adopción'],
                ['icon' => 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z', 'text' => 'Enviar una solicitud de adopción'],
                ['icon' => 'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2', 'text' => 'Dar seguimiento a tus solicitudes'],
            ] as $item)
            <div class="flex items-center gap-3">
                <div style="width:32px; height:32px; background:#f8f4e3; border-radius:8px; display:flex; align-items:center; justify-content:center; flex-shrink:0">
                    <svg style="width:16px;height:16px;stroke:#2d6a4f" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $item['icon'] }}"/>
                    </svg>
                </div>
                <span class="text-sm text-gray-600">{{ $item['text'] }}</span>
            </div>
            @endforeach
        </div>
    </div>

    {{-- CTA --}}
    <div>
        <a href="{{ route('animals.index') }}"
           class="inline-block text-sm font-medium text-white px-6 py-2.5 rounded-xl"
           style="background:#2d6a4f">
            Ver animales disponibles
        </a>
    </div>

</div>
@endsection
