@extends('layouts.admin')

@section('content')

<div style="max-width: 600px; margin: auto; padding: 20px;">

    <h1>➕ Registrar nuevo animal</h1>

    <form method="POST"
      action="{{ route('admin.animals.store') }}">

    @csrf

    <label>Nombre:</label><br>
    <input type="text" name="name"><br><br>

    <label>Tipo:</label><br>
    <input type="text" name="type"><br><br>

    <label>Raza:</label><br>
    <input type="text" name="breed"><br><br>

    <label>Edad:</label><br>
    <input type="number" name="age"><br><br>

    <label>Género:</label><br>

    <select name="gender">
        <option value="male">Macho</option>
        <option value="female">Hembra</option>
    </select>

    <br><br>

    <label>Estado:</label><br>

    <select name="status">
        <option value="available">Disponible</option>
        <option value="in_process">En proceso</option>
        <option value="adopted">Adoptado</option>
    </select>

    <br><br>

    <label>Salud:</label><br>
    <input type="text" name="health_status"><br><br>

    <label>Vacunas:</label><br>
    <textarea name="vaccines"></textarea><br><br>

    <label>Descripción:</label><br>
    <textarea name="description"></textarea><br><br>

    <label>Imagen (URL):</label><br>
    <input type="text" name="image"><br><br>

    <button type="submit">
        Guardar animal
    </button>

</form>

</div>

@endsection