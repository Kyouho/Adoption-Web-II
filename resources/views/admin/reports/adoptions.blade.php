@extends('layouts.admin')

@section('content')

<div style="padding: 1.5rem 2rem;">

    <div style="margin-bottom: 2rem;">
        <p style="font-size: 12px; font-weight: 500; color: #aaa; letter-spacing: 0.08em; text-transform: uppercase; margin: 0 0 6px;">
            Panel administrativo
        </p>
        <h1 style="font-size: 22px; font-weight: 500; margin: 0;">Reporte de adopciones</h1>
    </div>

    <div style="border: 0.5px solid #e5e5e3; border-radius: 12px; overflow: hidden;">
        <table style="width: 100%; border-collapse: collapse; font-size: 14px;">

            <thead>
                <tr style="background: #f5f5f3;">
                    <th style="text-align: left; padding: 10px 16px; font-size: 12px; font-weight: 500; color: #888; letter-spacing: 0.06em; text-transform: uppercase; border-bottom: 0.5px solid #e5e5e3;">Animal</th>
                    <th style="text-align: left; padding: 10px 16px; font-size: 12px; font-weight: 500; color: #888; letter-spacing: 0.06em; text-transform: uppercase; border-bottom: 0.5px solid #e5e5e3;">Adoptante</th>
                    <th style="text-align: left; padding: 10px 16px; font-size: 12px; font-weight: 500; color: #888; letter-spacing: 0.06em; text-transform: uppercase; border-bottom: 0.5px solid #e5e5e3;">Fecha</th>
                </tr>
            </thead>

            <tbody>
                @foreach($adoptions as $adoption)
                <tr style="border-bottom: 0.5px solid #e5e5e3;">
                    <td style="padding: 12px 16px;">{{ $adoption->application->animal->name }}</td>
                    <td style="padding: 12px 16px;">{{ $adoption->application->user->name }}</td>
                    <td style="padding: 12px 16px; color: #888; font-size: 13px;">{{ $adoption->adoption_date }}</td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>

</div>

@endsection
