@extends('layouts.admin')

@section('content')

<div style="padding:30px;">

    <h1>🐾 Gestión de animales</h1>

    <a href="{{ route('admin.animals.create') }}">
        <button>➕ Registrar animal</button>
    </a>

    <hr>

    <div style="display:flex; gap:20px; flex-wrap:wrap;">

        @foreach($animals as $animal)

            <div style="border:1px solid #ccc; padding:15px; width:250px;">

                <h3>{{ $animal->name }}</h3>

                <p>
                    <strong>Tipo:</strong>
                    {{ $animal->type }}
                </p>

                <p>
                    <strong>Estado:</strong>
                    {{ $animal->status }}
                </p>

                <a href="{{ route('admin.animals.show', $animal->id) }}">
                    <button>Ver</button>
                </a>

                <a href="{{ route('admin.animals.edit', $animal->id) }}">
                    <button>Editar</button>
                </a>

<form method="POST"
      action="{{ route('admin.animals.destroy', $animal->id) }}">

    @csrf
    @method('DELETE')

    <button type="submit">
        Eliminar
    </button>

</form>


            </div>

        @endforeach

    </div>

</div>

@endsection