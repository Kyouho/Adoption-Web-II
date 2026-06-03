@extends('layouts.admin')

@section('content')

<div style="padding: 1.5rem 2rem;">

    <div style="margin-bottom: 2rem;">
        <p style="font-size: 12px; font-weight: 500; color: #aaa; letter-spacing: 0.08em; text-transform: uppercase; margin: 0 0 6px;">
            Panel administrativo
        </p>
        <h1 style="font-size: 22px; font-weight: 500; margin: 0;">Estadísticas</h1>
    </div>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(140px, 1fr)); gap: 12px;">

        <div style="background: #f5f5f3; border-radius: 8px; padding: 1rem;">
            <p style="font-size: 12px; color: #888; margin: 0 0 8px;">🐾 Animales</p>
            <span style="font-size: 28px; font-weight: 500;">{{ $animals }}</span>
        </div>

        <div style="background: #f5f5f3; border-radius: 8px; padding: 1rem;">
            <p style="font-size: 12px; color: #888; margin: 0 0 8px;">📋 Solicitudes</p>
            <span style="font-size: 28px; font-weight: 500;">{{ $applications }}</span>
        </div>

        <div style="background: #f5f5f3; border-radius: 8px; padding: 1rem;">
            <p style="font-size: 12px; color: #888; margin: 0 0 8px;">🤝 Adopciones</p>
            <span style="font-size: 28px; font-weight: 500;">{{ $adoptions }}</span>
        </div>

        <div style="background: #f5f5f3; border-radius: 8px; padding: 1rem;">
            <p style="font-size: 12px; color: #888; margin: 0 0 8px;">🐶 Disponibles</p>
            <span style="font-size: 28px; font-weight: 500;">{{ $availableAnimals }}</span>
        </div>

    </div>

</div>

@endsection
