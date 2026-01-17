@extends('layouts.app')

@section('content')

@include('components.navbar')

<!-- HERO -->
<section class="pt-24 relative">
    <img src="{{ asset('img/ecoturisticos/miramar.jpg') }}"
         class="w-full h-[500px] object-cover"
         alt="Ecoturísticos Ocosingo">

    <div class="absolute inset-0 bg-black/50 flex items-center">
        <div class="max-w-7xl mx-auto px-6 text-white">
            <h1 class="text-5xl font-bold mb-4">
                Destinos Ecoturísticos
            </h1>
            <p class="text-lg max-w-2xl">
                Naturaleza, aventura y conexión con el entorno.
            </p>
        </div>
    </div>
</section>

<!-- DESCRIPCIÓN -->
<section class="max-w-7xl mx-auto px-6 py-16">
    <p class="text-gray-700 text-lg leading-relaxed max-w-3xl">
        Explora reservas naturales, cascadas y comunidades
        que promueven el turismo sustentable.
    </p>
</section>

<!-- GRID ECOTURÍSTICOS -->
<section class="max-w-7xl mx-auto px-6 pb-24">
    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-10">

        @forelse($sitios as $sitio)
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:scale-105 transition">

                <img src="{{ asset('storage/'.$sitio->foto) }}"
                     class="h-52 w-full object-cover"
                     alt="{{ $sitio->nombre }}">

                <div class="p-6">
                    <h3 class="text-2xl font-semibold text-emerald-600 mb-2">
                        {{ $sitio->nombre }}
                    </h3>

                    <p class="text-gray-600 mb-4 line-clamp-3">
                        {{ $sitio->descripcion }}
                    </p>

                    <a href="{{ route('ecoturisticos.show', $sitio->id_sitio) }}"
                       class="text-emerald-600 font-semibold hover:underline">
                        Ver más
                    </a>
                </div>
            </div>
        @empty
            {{-- Sin registros --}}
        @endforelse

    </div>
</section>

@include('components.footer')

@endsection
