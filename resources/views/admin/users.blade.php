@extends('layouts.admin')

@section('content')

<div style="padding: 1.5rem 2rem;">

    <div style="margin-bottom: 2rem;">
        <p style="font-size: 12px; font-weight: 500; color: #aaa; letter-spacing: 0.08em; text-transform: uppercase; margin: 0 0 6px;">
            Panel administrativo
        </p>
        <h1 style="font-size: 22px; font-weight: 500; margin: 0;">Usuarios registrados</h1>
    </div>

    <div style="border: 0.5px solid #e5e5e3; border-radius: 12px; overflow: hidden;">
        <table style="width: 100%; border-collapse: collapse; font-size: 14px; table-layout: fixed;">

            <thead>
                <tr style="background: #f5f5f3;">
                    <th style="text-align: left; padding: 10px 16px; font-size: 12px; font-weight: 500; color: #888; letter-spacing: 0.06em; text-transform: uppercase; border-bottom: 0.5px solid #e5e5e3; width: 16%;">Nombre</th>
                    <th style="text-align: left; padding: 10px 16px; font-size: 12px; font-weight: 500; color: #888; letter-spacing: 0.06em; text-transform: uppercase; border-bottom: 0.5px solid #e5e5e3; width: 20%;">Correo</th>
                    <th style="text-align: left; padding: 10px 16px; font-size: 12px; font-weight: 500; color: #888; letter-spacing: 0.06em; text-transform: uppercase; border-bottom: 0.5px solid #e5e5e3; width: 14%;">Teléfono</th>
                    <th style="text-align: left; padding: 10px 16px; font-size: 12px; font-weight: 500; color: #888; letter-spacing: 0.06em; text-transform: uppercase; border-bottom: 0.5px solid #e5e5e3; width: 20%;">Dirección</th>
                    <th style="text-align: left; padding: 10px 16px; font-size: 12px; font-weight: 500; color: #888; letter-spacing: 0.06em; text-transform: uppercase; border-bottom: 0.5px solid #e5e5e3; width: 10%;">Rol</th>
                    <th style="text-align: left; padding: 10px 16px; font-size: 12px; font-weight: 500; color: #888; letter-spacing: 0.06em; text-transform: uppercase; border-bottom: 0.5px solid #e5e5e3; width: 14%;">Registro</th>
                </tr>
            </thead>

            <tbody>
                @forelse($users as $user)
                <tr style="border-bottom: 0.5px solid #e5e5e3;">
                    <td style="padding: 12px 16px; font-weight: 500; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                        {{ $user->name }}
                    </td>
                    <td style="padding: 12px 16px; color: #888; font-size: 13px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                        {{ $user->email }}
                    </td>
                    <td style="padding: 12px 16px; font-size: 13px; {{ is_null($user->phone) ? 'color:#bbb; font-style:italic;' : '' }}">
                        {{ $user->phone ?? 'No registrado' }}
                    </td>
                    <td style="padding: 12px 16px; font-size: 13px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; {{ is_null($user->address) ? 'color:#bbb; font-style:italic;' : '' }}">
                        {{ $user->address ?? 'No registrada' }}
                    </td>
                    <td style="padding: 12px 16px;">
                        @if($user->role === 'admin')
                            <span style="font-size: 11px; font-weight: 500; padding: 3px 8px; border-radius: 6px; background: #e6f1fb; color: #185fa5;">
                                admin
                            </span>
                        @else
                            <span style="font-size: 11px; font-weight: 500; padding: 3px 8px; border-radius: 6px; background: #f5f5f3; color: #888;">
                                {{ $user->role }}
                            </span>
                        @endif
                    </td>
                    <td style="padding: 12px 16px; color: #888; font-size: 13px;">
                        {{ $user->created_at->format('d/m/Y') }}
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" style="padding: 24px 16px; text-align: center; color: #bbb; font-size: 14px;">
                        No hay usuarios registrados.
                    </td>
                </tr>
                @endforelse
            </tbody>

        </table>
    </div>

</div>

@endsection
