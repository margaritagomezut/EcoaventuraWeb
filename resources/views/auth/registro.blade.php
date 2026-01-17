@extends('layouts.app')

@section('content')

@include('components.navbar')

<div class="pt-32 pb-20 bg-gray-50 min-h-screen">
    <div class="max-w-6xl mx-auto px-6">

        <h1 class="text-3xl font-bold text-center mb-4">
            Crear una cuenta
        </h1>

        <p class="text-center text-gray-600 mb-12">
            Selecciona el tipo de cuenta con la que deseas registrarte
        </p>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

            <!-- TURISTA -->
            <div class="bg-white rounded-xl shadow p-6 text-center hover:shadow-lg transition">
                <img src="{{ asset('img/iconos/turista.png') }}"
                     class="w-20 mx-auto mb-4"
                     alt="Turista">

                <h2 class="text-xl font-semibold mb-2">Turista</h2>
                <p class="text-gray-600 mb-6">
                    Explora destinos, guarda favoritos y realiza reservaciones.
                </p>

                <a href="{{ route('registro.turista.form') }}"
                   class="inline-block bg-emerald-600 text-white px-6 py-2 rounded hover:bg-emerald-700 transition">
                    Registrarme como turista
                </a>
            </div>

            <!-- HOTELERO -->
            <div class="bg-white rounded-xl shadow p-6 text-center hover:shadow-lg transition">
                <img src="{{ asset('img/iconos/hotel.png') }}"
                     class="w-20 mx-auto mb-4"
                     alt="Hotelero">

                <h2 class="text-xl font-semibold mb-2">Hotelero</h2>
                <p class="text-gray-600 mb-6">
                    Registra tu hotel y gestiona habitaciones y reservas.
                </p>

                <a href="{{ route('registro.hotelero.form') }}"
                   class="inline-block bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition">
                    Solicitar registro
                </a>

                <p class="text-xs text-gray-500 mt-3">
                    * Sujeto a aprobación del administrador
                </p>
            </div>

            <!-- RESTAURANTERO -->
            <div class="bg-white rounded-xl shadow p-6 text-center hover:shadow-lg transition">
                <img src="{{ asset('img/iconos/restaurante.png') }}"
                     class="w-20 mx-auto mb-4"
                     alt="Restaurantero">

                <h2 class="text-xl font-semibold mb-2">Restaurantero</h2>
                <p class="text-gray-600 mb-6">
                    Publica tu restaurante y muestra tu menú a los turistas.
                </p>

                <a href="{{ route('registro.restaurantero.form') }}"
                   class="inline-block bg-orange-600 text-white px-6 py-2 rounded hover:bg-orange-700 transition">
                    Solicitar registro
                </a>

                <p class="text-xs text-gray-500 mt-3">
                    * Sujeto a aprobación del administrador
                </p>
            </div>

        </div>

        <p class="text-center text-gray-600 mt-10">
            ¿Ya tienes cuenta?
            <a href="{{ route('login') }}" class="text-emerald-600 font-semibold hover:underline">
                Inicia sesión
            </a>
        </p>

    </div>
</div>

@include('components.footer')

@endsection
