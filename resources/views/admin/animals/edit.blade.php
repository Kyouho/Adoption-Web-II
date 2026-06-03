@extends('layouts.admin')

@section('content')

<div style="padding: 1.5rem 2rem;">

    <div style="margin-bottom: 2rem;">
        <p style="font-size: 12px; font-weight: 500; color: #aaa; letter-spacing: 0.08em; text-transform: uppercase; margin: 0 0 6px;">
            Panel administrativo
        </p>
        <h1 style="font-size: 22px; font-weight: 500; margin: 0;">Editar animal</h1>
    </div>

    <div style="max-width: 560px; background: #fff; border: 0.5px solid #e5e5e3; border-radius: 12px; padding: 1.5rem;">

        <form method="POST" action="{{ route('admin.animals.update', $animal->id) }}">
            @csrf
            @method('PUT')

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px; margin-bottom: 16px;">

                <div>
                    <label style="display: block; font-size: 12px; font-weight: 500; color: #888; margin-bottom: 6px; text-transform: uppercase; letter-spacing: 0.06em;">
                        Nombre
                    </label>
                    <input type="text" name="name" value="{{ $animal->name }}" style="width: 100%; box-sizing: border-box;">
                </div>

                <div>
                    <label style="display: block; font-size: 12px; font-weight: 500; color: #888; margin-bottom: 6px; text-transform: uppercase; letter-spacing: 0.06em;">
                        Tipo
                    </label>
                    <input type="text" name="type" value="{{ $animal->type }}" style="width: 100%; box-sizing: border-box;">
                </div>

                <div>
                    <label style="display: block; font-size: 12px; font-weight: 500; color: #888; margin-bottom: 6px; text-transform: uppercase; letter-spacing: 0.06em;">
                        Raza
                    </label>
                    <input type="text" name="breed" value="{{ $animal->breed }}" style="width: 100%; box-sizing: border-box;">
                </div>

                <div>
                    <label style="display: block; font-size: 12px; font-weight: 500; color: #888; margin-bottom: 6px; text-transform: uppercase; letter-spacing: 0.06em;">
                        Edad
                    </label>
                    <input type="number" name="age" value="{{ $animal->age }}" style="width: 100%; box-sizing: border-box;">
                </div>

            </div>

            <div style="border-top: 0.5px solid #e5e5e3; padding-top: 16px; display: flex; justify-content: flex-end;">
                <button type="submit" style="padding: 0 20px; height: 36px; font-size: 14px; cursor: pointer; border-radius: 8px; display: inline-flex; align-items: center; gap: 8px;">
                    ✓ Actualizar
                </button>
            </div>

        </form>

    </div>

</div>

@endsection
