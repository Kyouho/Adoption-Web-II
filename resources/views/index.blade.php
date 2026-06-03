@extends('layouts.app')

@section('title', 'PataHogar — Adopta un amigo')

@section('content')

{{-- Hero --}}
<section style="background:#fff; border-bottom:.5px solid #e5e7eb; padding:5rem 1.5rem">
    <div style="max-width:680px; margin:0 auto; text-align:center">
        <span style="display:inline-block; background:#d8f3dc; color:#2d6a4f; font-size:.75rem; font-weight:500; padding:4px 14px; border-radius:20px; margin-bottom:1.5rem">
            🐾 Plataforma de adopción animal
        </span>
        <h1 style="font-family:'Playfair Display',serif; font-size:3rem; font-weight:600; color:#1a1a1a; line-height:1.15; margin:0 0 1.25rem">
            Dale un hogar a quien<br>más lo necesita
        </h1>
        <p style="font-size:1.0625rem; color:#6b7280; line-height:1.7; margin:0 auto 2.5rem; max-width:500px">
            Conectamos animales rescatados con familias que les darán el amor y cuidado que merecen.
        </p>
        <div style="display:flex; gap:12px; justify-content:center; flex-wrap:wrap">
            <a href="{{ route('animals.index') }}"
               style="background:#2d6a4f; color:#fff; font-size:.9375rem; font-weight:500; padding:12px 28px; border-radius:10px; text-decoration:none">
                Ver animales
            </a>
            @guest
            <a href="{{ route('login') }}"
               style="background:#fff; color:#374151; font-size:.9375rem; font-weight:500; padding:12px 28px; border-radius:10px; text-decoration:none; border:.5px solid #e5e7eb">
                Iniciar sesión
            </a>
            <a href="{{ route('register') }}"
               style="background:#fff; color:#374151; font-size:.9375rem; font-weight:500; padding:12px 28px; border-radius:10px; text-decoration:none; border:.5px solid #e5e7eb">
                Registrarse
            </a>
            @endguest
        </div>
    </div>
</section>

{{-- Stats --}}
<section style="background:#f8f4e3; padding:3rem 1.5rem; border-bottom:.5px solid #e5e7eb">
    <div style="max-width:760px; margin:0 auto; display:grid; grid-template-columns:repeat(3,1fr); gap:1.5rem; text-align:center">
        @foreach([
            ['num' => '200+', 'label' => 'Animales rescatados'],
            ['num' => '150+', 'label' => 'Hogares encontrados'],
            ['num' => '50+',  'label' => 'En adopción ahora'],
        ] as $stat)
        <div>
            <p style="font-family:'Playfair Display',serif; font-size:2.25rem; font-weight:600; color:#2d6a4f; margin:0">{{ $stat['num'] }}</p>
            <p style="font-size:.875rem; color:#6b7280; margin:.25rem 0 0">{{ $stat['label'] }}</p>
        </div>
        @endforeach
    </div>
</section>

{{-- Cómo funciona --}}
<section style="padding:4rem 1.5rem; background:#fff">
    <div style="max-width:760px; margin:0 auto">
        <h2 style="font-family:'Playfair Display',serif; font-size:1.75rem; font-weight:600; color:#1a1a1a; text-align:center; margin:0 0 2.5rem">¿Cómo funciona?</h2>
        <div style="display:grid; grid-template-columns:repeat(3,1fr); gap:1.5rem">
            @foreach([
                ['step'=>'01','title'=>'Explora','desc'=>'Navega los animales disponibles y encuentra el que conecte contigo.'],
                ['step'=>'02','title'=>'Solicita','desc'=>'Envía tu solicitud de adopción con tu información de contacto.'],
                ['step'=>'03','title'=>'Adopta','desc'=>'Nuestro equipo revisa tu solicitud y te contacta para coordinar.'],
            ] as $item)
            <div style="background:#f8f4e3; border-radius:16px; padding:1.75rem">
                <p style="font-family:'Playfair Display',serif; font-size:2rem; font-weight:600; color:#31a341; margin:0 0 .75rem; line-height:1">{{ $item['step'] }}</p>
                <h3 style="font-size:1rem; font-weight:500; color:#1a1a1a; margin:0 0 .5rem">{{ $item['title'] }}</h3>
                <p style="font-size:.875rem; color:#6b7280; line-height:1.6; margin:0">{{ $item['desc'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- CTA final --}}
<section style="background:#2d6a4f; padding:4rem 1.5rem; text-align:center">
    <div style="max-width:560px; margin:0 auto">
        <h2 style="font-family:'Playfair Display',serif; font-size:1.875rem; font-weight:600; color:#fff; margin:0 0 1rem">
            ¿Listo para cambiar una vida?
        </h2>
        <p style="font-size:.9375rem; color:#d8f3dc; line-height:1.7; margin:0 0 2rem">
            Cada adopción hace la diferencia. Encuentra a tu compañero hoy.
        </p>
        <a href="{{ route('animals.index') }}"
           style="display:inline-block; background:#fff; color:#2d6a4f; font-size:.9375rem; font-weight:500; padding:12px 28px; border-radius:10px; text-decoration:none">
            Ver animales disponibles
        </a>
    </div>
</section>

@endsection
