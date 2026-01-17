@extends('layouts.app')

@section('content')
    @include('components.navbar')

    <div class="pt-32 max-w-6xl mx-auto px-6">
        <h1 class="text-3xl font-bold mb-6">Panel de Administración</h1>

        <div class="grid md:grid-cols-3 gap-6">
            <!-- Total Hoteleros -->
            <div class="p-6 bg-white shadow rounded hover:bg-gray-50">
                <h2 class="text-xl font-semibold">Total Hoteleros</h2>
                <p class="text-gray-600 mt-2">{{ $totalHoteleros }}</p>
            </div>

            <!-- Total Restauranteros -->
            <div class="p-6 bg-white shadow rounded hover:bg-gray-50">
                <h2 class="text-xl font-semibold">Total Restauranteros</h2>
                <p class="text-gray-600 mt-2">{{ $totalRestaurantes }}</p>
            </div>

            <!-- Solicitudes Pendientes -->
            <a href="{{ route('admin.solicitudes') }}" class="p-6 bg-white shadow rounded hover:bg-gray-50">
                <h2 class="text-xl font-semibold">Solicitudes pendientes</h2>
                <p class="text-gray-600 mt-2">{{ $solicitudesPendientes }} usuarios por aprobar</p>
            </a>
        </div>

    </div>

    @include('components.footer')
@endsection
