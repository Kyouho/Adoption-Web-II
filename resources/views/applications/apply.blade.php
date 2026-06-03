@extends('layouts.user')

@section('title', 'Solicitud de adopción — PataHogar')

@section('content')

<div class="mb-6">
    <a href="{{ route('animals.show', $animal->id) }}"
       class="inline-flex items-center gap-1 text-sm text-gray-500 hover:text-gray-900 transition-colors">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
        </svg>
        Volver al animal
    </a>
</div>

<div style="max-width:620px; margin:0 auto">
    <div style="background:#fff; border-radius:16px; border:.5px solid #e5e7eb; overflow:hidden">

        <div style="padding:1.75rem 2rem; border-bottom:.5px solid #e5e7eb">
            <h1 style="font-family:'Playfair Display',serif; font-size:1.5rem; font-weight:600; color:#1a1a1a; margin:0 0 .25rem">
                Solicitud de adopción
            </h1>
            <p style="font-size:.875rem; color:#6b7280; margin:0">
                Animal: <span style="font-weight:500; color:#374151">{{ $animal->name }}</span>
            </p>
        </div>

        @if($errors->any())
        <div style="margin:1.25rem 2rem 0; padding:.75rem 1rem; border-radius:10px; background:#fef2f2; border:.5px solid #fecaca; color:#991b1b; font-size:.875rem">
            <ul style="margin:0; padding-left:1.25rem">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form method="POST" action="{{ route('apply.store', $animal->id) }}">
            @csrf
            <div style="padding:1.75rem 2rem; display:flex; flex-direction:column; gap:1.25rem">

                <div>
                    <label style="display:block; font-size:.875rem; font-weight:500; color:#374151; margin-bottom:.5rem">
                        Tipo de vivienda <span style="color:#f87171">*</span>
                    </label>
                    <input type="text"
                           name="housing_type"
                           value="{{ old('housing_type') }}"
                           placeholder="Ej: Casa con jardín, apartamento..."
                           style="width:100%; padding:.625rem .875rem; font-size:.875rem; border:.5px solid #e5e7eb; border-radius:10px; background:#f9fafb; color:#1a1a1a; font-family:'DM Sans',sans-serif; box-sizing:border-box; outline:none"
                           required>
                </div>

                <div>
                    <label style="display:block; font-size:.875rem; font-weight:500; color:#374151; margin-bottom:.5rem">
                        Experiencia con mascotas
                    </label>
                    <textarea name="experience_with_pets"
                              rows="4"
                              placeholder="Cuéntanos si has tenido mascotas antes..."
                              style="width:100%; padding:.625rem .875rem; font-size:.875rem; border:.5px solid #e5e7eb; border-radius:10px; background:#f9fafb; color:#1a1a1a; font-family:'DM Sans',sans-serif; box-sizing:border-box; resize:none; outline:none">{{ old('experience_with_pets') }}</textarea>
                </div>

                <div>
                    <label style="display:block; font-size:.875rem; font-weight:500; color:#374151; margin-bottom:.5rem">
                        Motivo de adopción <span style="color:#f87171">*</span>
                    </label>
                    <textarea name="motivation"
                              rows="4"
                              placeholder="¿Por qué quieres adoptar a este animal?"
                              style="width:100%; padding:.625rem .875rem; font-size:.875rem; border:.5px solid #e5e7eb; border-radius:10px; background:#f9fafb; color:#1a1a1a; font-family:'DM Sans',sans-serif; box-sizing:border-box; resize:none; outline:none"
                              required>{{ old('motivation') }}</textarea>
                </div>

            </div>

            <div style="padding:1.25rem 2rem; border-top:.5px solid #e5e7eb; display:flex; justify-content:flex-end; gap:.75rem">
                <a href="{{ route('animals.show', $animal->id) }}"
                   style="padding:.625rem 1.25rem; border-radius:10px; font-size:.875rem; font-weight:500; color:#6b7280; border:.5px solid #e5e7eb; text-decoration:none; background:#fff">
                    Cancelar
                </a>
                <button type="submit"
                        style="padding:.625rem 1.5rem; border-radius:10px; font-size:.875rem; font-weight:500; color:#fff; background:#2d6a4f; border:none; cursor:pointer; font-family:'DM Sans',sans-serif">
                    Enviar solicitud
                </button>
            </div>
        </form>

    </div>
</div>

@endsection
