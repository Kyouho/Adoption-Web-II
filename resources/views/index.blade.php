@extends('layouts.app')

@section('content')

<section style="text-align: center; padding: 50px;">

    <h1>🐾 Bienvenido al sistema de adopción</h1>

    <p>
        Plataforma para gestionar y facilitar la adopción de animales rescatados.
        Encuentra tu próximo compañero y dale un hogar.
    </p>

    <br>

    <a href="{{ route('animals.index') }}">
        <button>Ver animales</button>
    </a>

    <a href="{{ route('login') }}">
        <button>Iniciar sesión</button>
    </a>

    <a href="{{ route('register') }}">
        <button>Registrarse</button>
    </a>

</section>

@endsection