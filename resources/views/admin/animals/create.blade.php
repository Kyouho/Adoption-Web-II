@extends('layouts.admin')

@section('page-title', 'Registrar animal')
@section('page-subtitle', 'Añadir nuevo animal al sistema')

@section('content')

<div style="max-width:580px">
    <div style="margin-bottom:1rem">
        <a href="{{ route('admin.animals') }}"
           style="display:inline-flex; align-items:center; gap:4px; font-size:.875rem; color:#6b7280; text-decoration:none">
            <svg style="width:16px;height:16px" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
            Volver a animales
        </a>
    </div>

    <div style="background:#fff; border-radius:16px; border:.5px solid #e5e7eb; overflow:hidden">

        <div style="padding:1.5rem 2rem; border-bottom:.5px solid #e5e7eb">
            <h1 style="font-family:'Playfair Display',serif; font-size:1.25rem; font-weight:600; color:#1a1a1a; margin:0">
                Registrar nuevo animal
            </h1>
        </div>

        <form method="POST" action="{{ route('admin.animals.store') }}">
            @csrf
            <div style="padding:1.5rem 2rem; display:flex; flex-direction:column; gap:1.25rem">

                <div style="display:grid; grid-template-columns:1fr 1fr; gap:1rem">
                    <div>
                        <label style="display:block; font-size:.8125rem; font-weight:500; color:#374151; margin-bottom:.375rem">Nombre</label>
                        <input type="text" name="name" value="{{ old('name') }}"
                               style="width:100%; padding:.5rem .75rem; font-size:.875rem; border:.5px solid #e5e7eb; border-radius:8px; background:#f9fafb; color:#1a1a1a; box-sizing:border-box; outline:none; font-family:'DM Sans',sans-serif">
                    </div>
                    <div>
                        <label style="display:block; font-size:.8125rem; font-weight:500; color:#374151; margin-bottom:.375rem">Tipo</label>
                        <input type="text" name="type" value="{{ old('type') }}"
                               style="width:100%; padding:.5rem .75rem; font-size:.875rem; border:.5px solid #e5e7eb; border-radius:8px; background:#f9fafb; color:#1a1a1a; box-sizing:border-box; outline:none; font-family:'DM Sans',sans-serif">
                    </div>
                </div>

                <div style="display:grid; grid-template-columns:1fr 1fr; gap:1rem">
                    <div>
                        <label style="display:block; font-size:.8125rem; font-weight:500; color:#374151; margin-bottom:.375rem">Raza</label>
                        <input type="text" name="breed" value="{{ old('breed') }}"
                               style="width:100%; padding:.5rem .75rem; font-size:.875rem; border:.5px solid #e5e7eb; border-radius:8px; background:#f9fafb; color:#1a1a1a; box-sizing:border-box; outline:none; font-family:'DM Sans',sans-serif">
                    </div>
                    <div>
                        <label style="display:block; font-size:.8125rem; font-weight:500; color:#374151; margin-bottom:.375rem">Edad</label>
                        <input type="number" name="age" value="{{ old('age') }}"
                               style="width:100%; padding:.5rem .75rem; font-size:.875rem; border:.5px solid #e5e7eb; border-radius:8px; background:#f9fafb; color:#1a1a1a; box-sizing:border-box; outline:none; font-family:'DM Sans',sans-serif">
                    </div>
                </div>

                <div style="display:grid; grid-template-columns:1fr 1fr; gap:1rem">
                    <div>
                        <label style="display:block; font-size:.8125rem; font-weight:500; color:#374151; margin-bottom:.375rem">Género</label>
                        <select name="gender"
                                style="width:100%; padding:.5rem .75rem; font-size:.875rem; border:.5px solid #e5e7eb; border-radius:8px; background:#f9fafb; color:#1a1a1a; box-sizing:border-box; outline:none; font-family:'DM Sans',sans-serif">
                            <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Macho</option>
                            <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Hembra</option>
                        </select>
                    </div>
                    <div>
                        <label style="display:block; font-size:.8125rem; font-weight:500; color:#374151; margin-bottom:.375rem">Estado</label>
                        <select name="status"
                                style="width:100%; padding:.5rem .75rem; font-size:.875rem; border:.5px solid #e5e7eb; border-radius:8px; background:#f9fafb; color:#1a1a1a; box-sizing:border-box; outline:none; font-family:'DM Sans',sans-serif">
                            <option value="available" {{ old('status') == 'available' ? 'selected' : '' }}>Disponible</option>
                            <option value="in_process" {{ old('status') == 'in_process' ? 'selected' : '' }}>En proceso</option>
                            <option value="adopted" {{ old('status') == 'adopted' ? 'selected' : '' }}>Adoptado</option>
                        </select>
                    </div>
                </div>

                <div>
                    <label style="display:block; font-size:.8125rem; font-weight:500; color:#374151; margin-bottom:.375rem">Estado de salud</label>
                    <input type="text" name="health_status" value="{{ old('health_status') }}"
                           style="width:100%; padding:.5rem .75rem; font-size:.875rem; border:.5px solid #e5e7eb; border-radius:8px; background:#f9fafb; color:#1a1a1a; box-sizing:border-box; outline:none; font-family:'DM Sans',sans-serif">
                </div>

                <div>
                    <label style="display:block; font-size:.8125rem; font-weight:500; color:#374151; margin-bottom:.375rem">Vacunas</label>
                    <textarea name="vaccines" rows="2"
                              style="width:100%; padding:.5rem .75rem; font-size:.875rem; border:.5px solid #e5e7eb; border-radius:8px; background:#f9fafb; color:#1a1a1a; box-sizing:border-box; outline:none; resize:none; font-family:'DM Sans',sans-serif">{{ old('vaccines') }}</textarea>
                </div>

                <div>
                    <label style="display:block; font-size:.8125rem; font-weight:500; color:#374151; margin-bottom:.375rem">Descripción</label>
                    <textarea name="description" rows="3"
                              style="width:100%; padding:.5rem .75rem; font-size:.875rem; border:.5px solid #e5e7eb; border-radius:8px; background:#f9fafb; color:#1a1a1a; box-sizing:border-box; outline:none; resize:none; font-family:'DM Sans',sans-serif">{{ old('description') }}</textarea>
                </div>

                <div>
                    <label style="display:block; font-size:.8125rem; font-weight:500; color:#374151; margin-bottom:.375rem">Imagen (URL)</label>
                    <input type="text" name="image" value="{{ old('image') }}"
                           placeholder="https://..."
                           style="width:100%; padding:.5rem .75rem; font-size:.875rem; border:.5px solid #e5e7eb; border-radius:8px; background:#f9fafb; color:#1a1a1a; box-sizing:border-box; outline:none; font-family:'DM Sans',sans-serif">
                </div>

            </div>

            <div style="padding:1.25rem 2rem; border-top:.5px solid #e5e7eb; display:flex; justify-content:flex-end; gap:.75rem">
                <a href="{{ route('admin.animals') }}"
                   style="padding:.5rem 1.25rem; border-radius:8px; font-size:.875rem; font-weight:500; color:#6b7280; border:.5px solid #e5e7eb; text-decoration:none; background:#fff">
                    Cancelar
                </a>
                <button type="submit"
                        style="padding:.5rem 1.5rem; border-radius:8px; font-size:.875rem; font-weight:500; color:#fff; background:#2d6a4f; border:none; cursor:pointer; font-family:'DM Sans',sans-serif">
                    Guardar animal
                </button>
            </div>
        </form>

    </div>
</div>

@endsection
