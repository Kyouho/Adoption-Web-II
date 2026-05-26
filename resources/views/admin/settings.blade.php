@extends('layouts.admin')

@section('content')

<div style="max-width: 600px; margin: auto; padding: 20px;">

    <h1>⚙️ Configuración del sistema</h1>

    <form>

        <label>Nombre del sistema:</label><br>
        <input type="text" value="Sistema de adopción" style="width:100%;"><br><br>

        <label>Correo de contacto:</label><br>
        <input type="email" value="fundacion@email.com" style="width:100%;"><br><br>

        <label>Modo:</label><br>
        <select style="width:100%;">
            <option selected>Producción</option>
            <option>Pruebas</option>
        </select><br><br>

        <a href="{{ route('admin.dashboard') }}">
            <button type="button">Guardar cambios</button>
        </a>

    </form>

</div>

@endsection