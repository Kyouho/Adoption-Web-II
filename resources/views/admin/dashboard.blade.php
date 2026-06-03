@extends('layouts.admin')

@section('page-title', 'Resumen')
@section('page-subtitle', 'Vista general del sistema')

@section('header-actions')
    <a href="{{ route('admin.animals.create') }}"
       class="px-4 py-2 rounded-lg text-sm font-medium text-white"
       style="background:#2d6a4f">
        + Registrar animal
    </a>
@endsection

@section('content')

<div class="mb-3">
    <p class="text-sm text-gray-500">Bienvenido, <span class="font-medium text-gray-700">{{ Auth::user()->name }}</span></p>
</div>

{{-- Stats --}}
<div style="display:grid; grid-template-columns:repeat(4,1fr); gap:1rem" class="mb-6">
    @foreach([
        ['label' => 'Animales registrados', 'value' => $totalAnimals,         'bg' => 'bg-green-50',  'color' => 'text-green-700'],
        ['label' => 'Disponibles',           'value' => $availableAnimals,     'bg' => 'bg-green-50',  'color' => 'text-green-700'],
        ['label' => 'En proceso',            'value' => $inProcessAnimals,     'bg' => 'bg-yellow-50', 'color' => 'text-yellow-700'],
        ['label' => 'Adoptados',             'value' => $adoptedAnimals,       'bg' => 'bg-gray-50',   'color' => 'text-gray-700'],
        ['label' => 'Solicitudes totales',   'value' => $totalApplications,    'bg' => 'bg-blue-50',   'color' => 'text-blue-700'],
        ['label' => 'Pendientes',            'value' => $pendingApplications,  'bg' => 'bg-yellow-50', 'color' => 'text-yellow-700'],
        ['label' => 'Aprobadas',             'value' => $approvedApplications, 'bg' => 'bg-green-50',  'color' => 'text-green-700'],
        ['label' => 'Adopciones',            'value' => $totalAdoptions,       'bg' => 'bg-green-50',  'color' => 'text-green-700'],
    ] as $stat)
    <div class="{{ $stat['bg'] }} rounded-xl border border-gray-100 p-4 text-center">
        <p class="font-serif text-3xl font-semibold {{ $stat['color'] }}">{{ $stat['value'] }}</p>
        <p class="text-xs text-gray-500 mt-1">{{ $stat['label'] }}</p>
    </div>
    @endforeach
</div>

{{-- Accesos rápidos --}}
<div class="bg-white rounded-xl border border-gray-100 overflow-hidden">
    <div class="px-6 py-4 border-b border-gray-100">
        <h2 class="text-sm font-medium text-gray-900">Accesos rápidos</h2>
    </div>
    <div class="p-4 flex flex-wrap gap-3">
        @foreach([
            ['route' => 'admin.animals',      'label' => 'Gestionar animales'],
            ['route' => 'admin.applications', 'label' => 'Ver solicitudes'],
            ['route' => 'admin.reports',      'label' => 'Ver reportes'],
            ['route' => 'admin.users',        'label' => 'Ver usuarios'],
        ] as $link)
        <a href="{{ route($link['route']) }}"
           class="px-4 py-2 rounded-lg text-sm font-medium text-gray-700 border border-gray-200 hover:bg-gray-50 transition-colors">
            {{ $link['label'] }}
        </a>
        @endforeach
    </div>
</div>

@endsection
