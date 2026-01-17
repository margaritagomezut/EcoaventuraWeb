@extends('layouts.app')

@section('title', 'Hoteles | Ecoaventura')

@section('content')

@include('components.navbar')

<!-- HERO -->
<section class="pt-24 relative">
    <img src="{{ asset('img/fondo-hotel.png') }}"
         class="w-full h-[500px] object-cover"
         alt="Hoteles en Ocosingo">

    <div class="absolute inset-0 bg-black/50 flex items-center">
        <div class="max-w-7xl mx-auto px-6 text-white">
            <h1 class="text-4xl md:text-5xl font-bold mb-2">
                Hoteles en Ocosingo
            </h1>
            <p class="text-lg max-w-2xl">
                Encuentra el hospedaje ideal según tu presupuesto y necesidades
            </p>
        </div>
    </div>
</section>

<!-- CONTENIDO -->
<section class="max-w-7xl mx-auto px-6 py-16 grid grid-cols-1 lg:grid-cols-4 gap-10">

    <!-- FILTROS -->
    <aside class="lg:col-span-1 bg-white rounded-xl shadow p-6 h-fit sticky top-28">

        <h2 class="text-xl font-semibold text-emerald-600 mb-4">
            Filtros
        </h2>

        <!-- Precio -->
        <div class="mb-6">
            <h3 class="font-semibold mb-2">Precio por noche</h3>
            <label class="block text-sm">
                <input type="checkbox"> Económico
            </label>
            <label class="block text-sm">
                <input type="checkbox"> Medio
            </label>
            <label class="block text-sm">
                <input type="checkbox"> Premium
            </label>
        </div>

        <!-- Calificación -->
        <div class="mb-6">
            <h3 class="font-semibold mb-2">Calificación</h3>
            <label class="block text-sm">
                <input type="checkbox"> ⭐⭐⭐⭐ y más
            </label>
            <label class="block text-sm">
                <input type="checkbox"> ⭐⭐⭐ y más
            </label>
        </div>

        <!-- Servicios -->
        <div>
            <h3 class="font-semibold mb-2">Servicios</h3>
            <label class="block text-sm">
                <input type="checkbox"> Wi-Fi
            </label>
            <label class="block text-sm">
                <input type="checkbox"> Estacionamiento
            </label>
            <label class="block text-sm">
                <input type="checkbox"> Desayuno incluido
            </label>
        </div>

        {{-- FUTURO: FILTROS CON BD --}}
    </aside>

    <!-- LISTADO DE HOTELES -->
    <div class="lg:col-span-3 grid sm:grid-cols-2 gap-8">

        {{-- HOTEL CARD --}}
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition">
            <img src="{{ asset('img/servicios/hotel-1.jpg') }}"
                 class="h-48 w-full object-cover"
                 alt="Hotel">

            <div class="p-6">
                <h3 class="text-xl font-semibold text-gray-800 mb-1">
                    Hotel Selva Maya
                </h3>

                <p class="text-sm text-gray-500 mb-2">
                    ⭐⭐⭐⭐ · Centro de Ocosingo
                </p>

                <p class="text-gray-600 mb-4">
                    Comodidad y descanso rodeado de naturaleza.
                </p>

                <div class="flex justify-between items-center">
                    <span class="text-emerald-600 font-bold">
                        $850 MXN / noche
                    </span>

                    <a href="#"
                       class="text-emerald-600 font-semibold hover:underline">
                        Ver hotel
                    </a>
                </div>
            </div>
        </div>

        {{-- MÁS HOTELES ESTÁTICOS --}}
        {{-- FUTURO:
        @foreach($hoteles as $hotel)
            ...
        @endforeach
        --}}
    </div>
</section>

@include('components.footer')

@endsection
