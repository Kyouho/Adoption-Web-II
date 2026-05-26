@extends('layouts.admin')

@section('content')

<div style="max-width:700px; margin:auto; padding:30px;">

    <h1>✏️ Editar animal</h1>

    <form method="POST"
      action="{{ route('admin.animals.update', $animal->id) }}">

    @csrf
    @method('PUT')

    <label>Nombre:</label><br>

    <input type="text"
           name="name"
           value="{{ $animal->name }}">

    <br><br>

    <label>Tipo:</label><br>

    <input type="text"
           name="type"
           value="{{ $animal->type }}">

    <br><br>

    <label>Raza:</label><br>

    <input type="text"
           name="breed"
           value="{{ $animal->breed }}">

    <br><br>

    <label>Edad:</label><br>

    <input type="number"
           name="age"
           value="{{ $animal->age }}">

    <br><br>

    <button type="submit">
        Actualizar
    </button>

</form>

</div>

@endsection