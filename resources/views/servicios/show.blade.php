@extends('layouts.app')

@section('title', 'Detalle del servicio | Ecoaventura')

@section('content')

@include('components.navbar')

<!-- HERO -->
<section class="pt-24 relative">
    <img src="{{ asset('img/hoteles/hotel-1.jpg') }}"
         class="w-full h-[420px] object-cover"
         alt="Servicio">

    <div class="absolute inset-0 bg-black/50 flex items-end">
        <div class="max-w-7xl mx-auto px-6 pb-8 text-white">
            <span class="inline-block bg-emerald-600 px-4 py-1 rounded-full text-sm mb-3">
                Hotel
            </span>

            <h1 class="text-4xl md:text-5xl font-bold">
                Hotel Selva Maya
            </h1>

            <p class="text-lg mt-2">
                ⭐⭐⭐⭐ · Centro de Ocosingo
            </p>
        </div>
    </div>
</section>

<!-- CONTENIDO -->
<section class="max-w-7xl mx-auto px-6 py-16 grid grid-cols-1 lg:grid-cols-3 gap-12">

    <!-- INFO PRINCIPAL -->
    <div class="lg:col-span-2">

        <h2 class="text-2xl font-bold text-emerald-700 mb-4">
            Descripción
        </h2>

        <p class="text-gray-700 leading-relaxed mb-8">
            Hotel Selva Maya ofrece una experiencia cómoda y tranquila
            en el corazón de Ocosingo. Ideal para familias, turistas y
            viajeros de negocios que buscan descanso y buena ubicación.
        </p>

        <!-- GALERÍA -->
        <h2 class="text-2xl font-bold text-emerald-700 mb-4">
            Galería
        </h2>

        <div class="grid grid-cols-2 md:grid-cols-3 gap-4 mb-12">
            <img src="{{ asset('img/hoteles/hotel-1.jpg') }}" class="rounded-lg object-cover h-40 w-full">
            <img src="{{ asset('img/hoteles/hotel-2.jpg') }}" class="rounded-lg object-cover h-40 w-full">
            <img src="{{ asset('img/hoteles/hotel-3.jpg') }}" class="rounded-lg object-cover h-40 w-full">
        </div>

        <!-- RESEÑAS -->
        <h2 class="text-2xl font-bold text-emerald-700 mb-4">
            Reseñas
        </h2>

        <div class="space-y-4">
            <div class="bg-gray-50 p-4 rounded-lg">
                <p class="font-semibold">María López</p>
                <p class="text-sm text-gray-500">⭐⭐⭐⭐⭐</p>
                <p class="text-gray-700 mt-2">
                    Excelente servicio, habitaciones limpias y buena ubicación.
                </p>
            </div>

            <div class="bg-gray-50 p-4 rounded-lg">
                <p class="font-semibold">Carlos Pérez</p>
                <p class="text-sm text-gray-500">⭐⭐⭐⭐</p>
                <p class="text-gray-700 mt-2">
                    Muy cómodo y tranquilo, ideal para descansar.
                </p>
            </div>
        </div>

        {{-- FUTURO:
        @foreach($reseñas as $reseña)
            ...
        @endforeach
        --}}
    </div>

    <!-- SIDEBAR -->
    <aside class="bg-white rounded-xl shadow p-6 h-fit sticky top-28">

        <h3 class="text-xl font-semibold text-emerald-600 mb-4">
            Información
        </h3>

        <ul class="space-y-3 text-gray-700">
            <li><strong>Dirección:</strong> Av. Principal #123, Ocosingo</li>
            <li><strong>Teléfono:</strong> 919 123 4567</li>
            <li><strong>Horario:</strong> 24 horas</li>
            <li><strong>Precio:</strong> Desde $850 MXN / noche</li>
        </ul>

        <a href="#"
           class="mt-6 block text-center bg-emerald-600 text-white py-3 rounded-lg hover:bg-emerald-700">
            Contactar / Reservar
        </a>
    </aside>

</section>

@include('components.footer')

@endsection
