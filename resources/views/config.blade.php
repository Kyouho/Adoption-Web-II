@extends('layouts.app')

@section('content')

<div style="max-width: 600px; margin: auto; padding: 20px;">

    <h1>⚙️ Configuración</h1>

    <p>Opciones básicas del sistema (modo demostración).</p>

    <hr>

    <label>Tema:</label><br>
    <select style="width:100%;">
        <option>Claro</option>
        <option>Oscuro</option>
    </select><br><br>

    <label>Idioma:</label><br>
    <select style="width:100%;">
        <option>Español</option>
        <option>Inglés</option>
    </select><br><br>

</div>

@endsection