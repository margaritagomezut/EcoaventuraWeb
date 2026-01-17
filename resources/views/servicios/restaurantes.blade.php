@extends('layouts.app')

@section('title', 'Restaurantes | Ecoaventura')

@section('content')

@include('components.navbar')

<!-- HERO -->
<section class="pt-24 relative">
    <img src="{{ asset('img/fondo-restaurant.png') }}"
         class="w-full h-[500px] object-cover"
         alt="Restaurantes en Ocosingo">

    <div class="absolute inset-0 bg-black/50 flex items-center">
        <div class="max-w-7xl mx-auto px-6 text-white">
            <h1 class="text-4xl md:text-5xl font-bold mb-2">
                Restaurantes en Ocosingo
            </h1>
            <p class="text-lg max-w-2xl">
                Descubre dónde comer según tu gusto, presupuesto y ubicación
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

        <!-- Tipo de comida -->
        <div class="mb-6">
            <h3 class="font-semibold mb-2">Tipo de comida</h3>
            <label class="block text-sm">
                <input type="checkbox"> Mexicana
            </label>
            <label class="block text-sm">
                <input type="checkbox"> Regional
            </label>
            <label class="block text-sm">
                <input type="checkbox"> Internacional
            </label>
        </div>

        <!-- Precio -->
        <div class="mb-6">
            <h3 class="font-semibold mb-2">Costo promedio</h3>
            <label class="block text-sm">
                <input type="checkbox"> Económico
            </label>
            <label class="block text-sm">
                <input type="checkbox"> Medio
            </label>
            <label class="block text-sm">
                <input type="checkbox"> Alto
            </label>
        </div>

        <!-- Calificación -->
        <div>
            <h3 class="font-semibold mb-2">Calificación</h3>
            <label class="block text-sm">
                <input type="checkbox"> ⭐⭐⭐⭐ y más
            </label>
            <label class="block text-sm">
                <input type="checkbox"> ⭐⭐⭐ y más
            </label>
        </div>

        {{-- FUTURO: FILTROS DINÁMICOS CON BD --}}
    </aside>

    <!-- LISTADO DE RESTAURANTES -->
    <div class="lg:col-span-3 grid sm:grid-cols-2 gap-8">

        {{-- RESTAURANTE CARD --}}
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition">
            <img src="{{ asset('img/servicios/restaurante-1.jpg') }}"
                 class="h-48 w-full object-cover"
                 alt="Restaurante">

            <div class="p-6">
                <h3 class="text-xl font-semibold text-gray-800 mb-1">
                    Restaurante El Jaguar
                </h3>

                <p class="text-sm text-gray-500 mb-2">
                    ⭐⭐⭐⭐ · Comida regional
                </p>

                <p class="text-gray-600 mb-4">
                    Sabores tradicionales de la región con ingredientes locales.
                </p>

                <div class="flex justify-between items-center">
                    <span class="text-emerald-600 font-bold">
                        $$ · Precio medio
                    </span>

                    <a href="#"
                       class="text-emerald-600 font-semibold hover:underline">
                        Ver restaurante
                    </a>
                </div>
            </div>
        </div>

        {{-- MÁS RESTAURANTES ESTÁTICOS --}}
        {{-- FUTURO:
        @foreach($restaurantes as $restaurante)
            ...
        @endforeach
        --}}
    </div>
</section>

@include('components.footer')

@endsection
