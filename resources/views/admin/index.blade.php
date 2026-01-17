@extends('layouts.app')

@section('content')

@include('components.navbar')

<div class="pt-32 max-w-6xl mx-auto px-6">
    <h1 class="text-3xl font-bold mb-6">Panel de Administración</h1>

    <!-- Tarjetas de estadísticas -->
    <div class="grid md:grid-cols-3 gap-6">
        <!-- Total Hoteleros -->
        <div class="p-6 bg-white shadow rounded hover:bg-gray-50 transition">
            <h2 class="text-xl font-semibold">Total Hoteleros</h2>
            <p class="text-gray-600 mt-2 text-2xl font-bold">{{ $totalHoteleros }}</p>
        </div>

        <!-- Total Restauranteros -->
        <div class="p-6 bg-white shadow rounded hover:bg-gray-50 transition">
            <h2 class="text-xl font-semibold">Total Restauranteros</h2>
            <p class="text-gray-600 mt-2 text-2xl font-bold">{{ $totalRestaurantes }}</p>
        </div>

        <!-- Solicitudes Pendientes -->
        <a href="{{ route('admin.solicitudes') }}" 
           class="p-6 bg-white shadow rounded hover:bg-gray-50 transition">
            <h2 class="text-xl font-semibold">Solicitudes Pendientes</h2>
            <p class="text-gray-600 mt-2 text-2xl font-bold">{{ $solicitudesPendientes }}</p>
            <p class="text-gray-500 mt-1">Usuarios por aprobar</p>
        </a>
    </div>

    <!-- Enlaces a CRUD -->
    <div class="grid md:grid-cols-2 gap-6 mt-8">
        <!-- CRUD Destinos -->
        <a href="{{ route('destinos.index') }}" 
           class="p-6 bg-white shadow rounded hover:bg-gray-50 transition">
            <h2 class="text-xl font-semibold">CRUD Destinos</h2>
            <p class="text-gray-600 mt-2">Gestiona los destinos turísticos</p>
        </a>

        <!-- CRUD Servicios -->
        <a href="{{ route('servicios.index') }}" 
           class="p-6 bg-white shadow rounded hover:bg-gray-50 transition">
            <h2 class="text-xl font-semibold">CRUD Servicios</h2>
            <p class="text-gray-600 mt-2">Gestiona los servicios disponibles</p>
        </a>
    </div>
</div>

@include('components.footer')

@endsection
