@extends('layouts.app')

@section('content')

@include('components.navbar')

<!-- HERO SERVICIOS -->
<section class="pt-24 relative">
    <img src="{{ asset('img/servicios.index.jpg') }}"
         class="w-full h-[500px] object-cover"
         alt="Servicios Turísticos Ocosingo">

    <div class="absolute inset-0 bg-black/50 flex items-center">
        <div class="max-w-7xl mx-auto px-6 text-white text-center">
            <h1 class="text-5xl font-bold mb-4">
                Servicios en Ocosingo
            </h1>
            <p class="text-lg max-w-2xl mx-auto">
                Encuentra hospedaje y gastronomía local para disfrutar al máximo tu visita.
            </p>
        </div>
    </div>
</section>

<!-- BLOQUES DE SERVICIOS -->
<section class="max-w-7xl mx-auto px-6 py-20 grid md:grid-cols-2 gap-12">

    <!-- HOTELES -->
    <div class="bg-white rounded-3xl shadow-lg overflow-hidden hover:shadow-2xl transition">
        <img src="{{ asset('img/hoteles/hotel.jpg') }}"
             class="h-72 w-full object-cover"
             alt="Hoteles">

        <div class="p-10">
            <h2 class="text-3xl font-bold text-emerald-700 mb-4">
                Hoteles
            </h2>
            <p class="text-gray-600 mb-6">
                Desde hospedajes económicos hasta hoteles confortables
                para descansar después de tus aventuras.
            </p>

            <a href="{{ route('servicios.hoteles') }}"
               class="inline-block bg-emerald-600 text-white px-6 py-3 rounded-xl hover:bg-emerald-700 transition">
                Ver hoteles
            </a>
        </div>
    </div>

    <!-- RESTAURANTES -->
    <div class="bg-white rounded-3xl shadow-lg overflow-hidden hover:shadow-2xl transition">
        <img src="{{ asset('img/restaurantes/restaurante.jpg') }}"
             class="h-72 w-full object-cover"
             alt="Restaurantes">

        <div class="p-10">
            <h2 class="text-3xl font-bold text-emerald-700 mb-4">
                Restaurantes
            </h2>
            <p class="text-gray-600 mb-6">
                Sabores tradicionales y cocina local que reflejan
                la riqueza gastronómica de la región.
            </p>

            <a href="{{ route('servicios.restaurantes') }}"
               class="inline-block bg-emerald-600 text-white px-6 py-3 rounded-xl hover:bg-emerald-700 transition">
                Ver restaurantes
            </a>
        </div>
    </div>

</section>

@include('components.footer')

@endsection
