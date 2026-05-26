@extends('layouts.app')

@section('content')

<h1>🐶 Animales en adopción</h1>

<div style="display:flex; gap:20px; flex-wrap:wrap;">

@foreach($animals as $animal)

    <div style="border:1px solid #ccc; padding:15px; width:200px;">

        <img src="{{ $animal->image }}"
             width="100%">

        <h3>{{ $animal->name }}</h3>

        <p>{{ $animal->age }} años</p>

        <a href="{{ route('animals.show', $animal->id) }}">
            <button>Ver más</button>
        </a>

    </div>

@endforeach

</div>

@endsection