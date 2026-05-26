@extends('layouts.admin')

@section('content')

<div style="padding:30px;">

    <h1>📊 Estadísticas</h1>

    <hr>

    <div style="display:flex; gap:20px; flex-wrap:wrap;">

        <div style="border:1px solid #ccc; padding:20px; width:220px;">
            <h3>🐾 Animales</h3>
            <p>{{ $animals }}</p>
        </div>

        <div style="border:1px solid #ccc; padding:20px; width:220px;">
            <h3>📋 Solicitudes</h3>
            <p>{{ $applications }}</p>
        </div>

        <div style="border:1px solid #ccc; padding:20px; width:220px;">
            <h3>✅ Adopciones</h3>
            <p>{{ $adoptions }}</p>
        </div>

        <div style="border:1px solid #ccc; padding:20px; width:220px;">
            <h3>🐶 Disponibles</h3>
            <p>{{ $availableAnimals }}</p>
        </div>

    </div>

</div>

@endsection