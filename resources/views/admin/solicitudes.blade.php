@extends('layouts.app')

@section('content')
<h1>Bandeja de Solicitudes</h1>

<h2>Hoteleros pendientes</h2>
<table border="1" cellpadding="8">
    <tr>
        <th>Nombre</th>
        <th>Email</th>
        <th>Acción</th>
    </tr>
    @foreach($hoteleros as $hotelero)
    <tr>
        <td>{{ $hotelero->usuario->name }}</td>
        <td>{{ $hotelero->usuario->email }}</td>
        <td>
            <form action="{{ route('admin.aprobar', $hotelero->usuario->id) }}" method="POST">
                @csrf
                <button type="submit">Aprobar</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

<h2>Restauranteros pendientes</h2>
<table border="1" cellpadding="8">
    <tr>
        <th>Nombre</th>
        <th>Email</th>
        <th>Acción</th>
    </tr>
    @foreach($restauranteros as $restaurantero)
    <tr>
        <td>{{ $restaurantero->usuario->name }}</td>
        <td>{{ $restaurantero->usuario->email }}</td>
        <td>
            <form action="{{ route('admin.aprobar', $restaurantero->usuario->id) }}" method="POST">
                @csrf
                <button type="submit">Aprobar</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

<a href="{{ route('admin.dashboard') }}">Regresar al Dashboard</a>
@endsection
