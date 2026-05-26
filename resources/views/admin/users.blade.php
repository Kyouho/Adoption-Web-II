@extends('layouts.admin')

@section('content')

<div style="padding: 30px;">

    <h1>👥 Usuarios registrados</h1>

    <hr>

    <table border="1" width="100%" cellpadding="10">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Teléfono</th>
                <th>Dirección</th>
                <th>Rol</th>
                <th>Fecha de registro</th>
            </tr>
        </thead>

        <tbody>
            @forelse($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone ?? 'No registrado' }}</td>
                    <td>{{ $user->address ?? 'No registrada' }}</td>
                    <td>{{ $user->role }}</td>
                    <td>{{ $user->created_at->format('d/m/Y') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">No hay usuarios registrados.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</div>

@endsection