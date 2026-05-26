@extends('layouts.user')

@section('content')

<div class="max-w-2xl mx-auto p-6 bg-white shadow rounded">

    <h1 class="text-2xl font-bold mb-4">📋 Solicitud de adopción</h1>

    <h2 class="text-xl mb-4">
        Animal: {{ $animal->name }}
    </h2>

    @if($errors->any())
        <div class="mb-4 p-3 bg-red-100 text-red-700 rounded">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('apply.store', $animal->id) }}">
        @csrf

        <div class="mb-4">
            <label>Tipo de vivienda:</label>
            <input 
                type="text" 
                name="housing_type" 
                value="{{ old('housing_type') }}"
                class="w-full border rounded p-2"
                required
            >
        </div>

        <div class="mb-4">
            <label>Experiencia con mascotas:</label>
            <textarea 
                name="experience_with_pets" 
                class="w-full border rounded p-2"
            >{{ old('experience_with_pets') }}</textarea>
        </div>

        <div class="mb-4">
            <label>Motivo de adopción:</label>
            <textarea 
                name="motivation" 
                class="w-full border rounded p-2"
                required
            >{{ old('motivation') }}</textarea>
        </div>

        <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded">
            Enviar solicitud
        </button>

        <a href="{{ route('animals.show', $animal->id) }}">
            <button type="button" class="px-4 py-2 bg-gray-500 text-white rounded">
                Cancelar
            </button>
        </a>

    </form>

</div>

@endsection