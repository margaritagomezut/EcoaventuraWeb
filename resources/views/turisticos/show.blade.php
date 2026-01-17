@extends('layouts.app')

@section('content')

@include('components.navbar')

<!-- HERO -->
<section class="pt-24 relative">
    <img src="{{ asset('storage/'.$turistico->foto) }}"
         class="w-full h-[500px] object-cover"
         alt="{{ $turistico->nombre }}">

    <div class="absolute inset-0 bg-black/50 flex items-center">
        <div class="max-w-7xl mx-auto px-6 text-white">
            <h1 class="text-5xl font-bold mb-4">
                {{ $turistico->nombre }}
            </h1>
            <p class="text-lg max-w-2xl">
                {{ $turistico->direccion ?? '' }},
                {{ $turistico->ciudad ?? '' }}
            </p>
        </div>
    </div>
</section>

<!-- CONTENIDO -->
<section class="max-w-7xl mx-auto px-6 py-20 grid lg:grid-cols-3 gap-14">

    <!-- DESCRIPCIÓN -->
    <div class="lg:col-span-2">
        <h2 class="text-3xl font-bold text-emerald-700 mb-6">
            Descripción
        </h2>

        <p class="text-gray-700 text-lg leading-relaxed mb-8">
            {{ $turistico->descripcion }}
        </p>

        <!-- DETALLES -->
        <div class="grid sm:grid-cols-2 gap-6">

            <div class="flex items-start gap-4">
                <img src="{{ asset('img/icons/location.png') }}" class="w-8 h-8">
                <div>
                    <h4 class="font-semibold text-lg">Ubicación</h4>
                    <p class="text-gray-600">
                        {{ $turistico->direccion ?? 'No especificada' }}
                    </p>
                </div>
            </div>

            <div class="flex items-start gap-4">
                <img src="{{ asset('img/icons/users.png') }}" class="w-8 h-8">
                <div>
                    <h4 class="font-semibold text-lg">Tipo</h4>
                    <p class="text-gray-600">
                        Turístico
                    </p>
                </div>
            </div>

        </div>
    </div>

    <!-- SIDEBAR -->
    <aside class="bg-white rounded-3xl shadow-lg p-8 h-fit">
        <h3 class="text-2xl font-bold text-emerald-700 mb-6">
            Información rápida
        </h3>

        <ul class="space-y-4 text-gray-700">
            <li class="flex items-center gap-3">
                <img src="{{ asset('img/icons/money.png') }}" class="w-6 h-6">
                <span>
                    <strong>Entrada:</strong>
                    {{ $turistico->costo ? '$'.$turistico->costo : 'Gratuita' }}
                </span>
            </li>
        </ul>

        <a href="{{ route('turisticos.index') }}"
           class="mt-8 inline-block w-full text-center bg-emerald-600 text-white py-3 rounded-xl font-semibold hover:bg-emerald-700 transition">
            Volver a turísticos
        </a>
    </aside>

</section>

@include('components.footer')

@endsection
