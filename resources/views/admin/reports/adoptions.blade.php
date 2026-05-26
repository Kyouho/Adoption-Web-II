@extends('layouts.admin')

@section('content')

<div style="padding:30px;">

    <h1>📄 Reporte de adopciones</h1>

    <hr>

    <table border="1" width="100%" cellpadding="10">

        <thead>
            <tr>
                <th>Animal</th>
                <th>Adoptante</th>
                <th>Fecha</th>
            </tr>
        </thead>

        <tbody>

            @foreach($adoptions as $adoption)

                <tr>

                    <td>
                        {{ $adoption->application->animal->name }}
                    </td>

                    <td>
                        {{ $adoption->application->user->name }}
                    </td>

                    <td>
                        {{ $adoption->adoption_date }}
                    </td>

                </tr>

            @endforeach

        </tbody>

    </table>

</div>

@endsection