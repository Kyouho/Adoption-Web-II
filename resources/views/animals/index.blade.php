@extends('layouts.app')

@section('title', 'Animales en adopción — PataHogar')

@section('content')

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

    <div class="mb-8">
        <h1 class="font-serif text-2xl font-semibold text-gray-900">Animales en adopción</h1>
        <p class="text-sm text-gray-500 mt-1">Encuentra a tu próximo compañero</p>
    </div>

    <div style="display:grid; grid-template-columns:repeat(4,1fr); gap:1.25rem">
        @foreach($animals as $animal)
        <div class="bg-white rounded-xl border border-gray-100 overflow-hidden hover:border-gray-200 hover:shadow-sm transition-all">
            @if($animal->image)
                <img src="{{ $animal->image }}"
                     alt="{{ $animal->name }}"
                     style="width:100%; height:180px; object-fit:cover; display:block;">
            @else
                <div style="width:100%; height:180px; background:#f0fdf4; display:flex; align-items:center; justify-content:center; font-size:3rem;">
                    🐾
                </div>
            @endif

            <div class="p-4">
                <div class="flex items-start justify-between gap-2 mb-1">
                    <h3 class="font-medium text-gray-900 text-sm">{{ $animal->name }}</h3>
                    @if($animal->status === 'available')
                        <span class="flex-shrink-0 text-xs font-medium px-2 py-0.5 rounded-full bg-green-50 text-green-700 border border-green-100">
                            Disponible
                        </span>
                    @elseif($animal->status === 'in_process')
                        <span class="flex-shrink-0 text-xs font-medium px-2 py-0.5 rounded-full bg-yellow-50 text-yellow-700 border border-yellow-100">
                            En proceso
                        </span>
                    @else
                        <span class="flex-shrink-0 text-xs font-medium px-2 py-0.5 rounded-full bg-gray-100 text-gray-500 border border-gray-200">
                            Adoptado
                        </span>
                    @endif
                </div>
                <p class="text-xs text-gray-400 mb-4">{{ $animal->age }} años · {{ $animal->type }}</p>
                <a href="{{ route('animals.show', $animal->id) }}"
                   style="background:#2d6a4f"
                   class="block text-center w-full py-2 rounded-lg text-xs font-medium text-white transition-colors">
                    Ver más
                </a>
            </div>
        </div>
        @endforeach
    </div>

    @if($animals->isEmpty())
    <div class="text-center py-20">
        <div class="text-5xl mb-4">🐾</div>
        <p class="text-sm font-medium text-gray-900 mb-1">Sin animales disponibles</p>
        <p class="text-sm text-gray-500">Vuelve pronto, estamos rescatando más amigos.</p>
    </div>
    @endif

</div>

@endsection
