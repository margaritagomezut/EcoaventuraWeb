@extends('layouts.app')

@section('content')

@include('components.navbar')

<!-- HERO -->
<section class="pt-24 relative">
    <img src="{{ asset('img/turisticos/tonina.jpg') }}"
         class="w-full h-[500px] object-cover"
         alt="Turísticos Ocosingo">

    <div class="absolute inset-0 bg-black/50 flex items-center">
        <div class="max-w-7xl mx-auto px-6 text-white">
            <h1 class="text-5xl font-bold mb-4">
                Disfruta de los Sitios Turísticos
            </h1>
            <p class="text-lg max-w-2xl">
                Historia, cultura y paisajes que no te puedes perder.
            </p>
        </div>
    </div>
</section>

<!-- DESCRIPCIÓN -->
<section class="max-w-7xl mx-auto px-6 py-16">
    <p class="text-gray-700 text-lg leading-relaxed max-w-3xl">
        Ocosingo cuenta con sitios turísticos llenos de historia,
        tradiciones y vistas impresionantes.
    </p>
</section>

<!-- GRID DE TURÍSTICOS -->
<section class="max-w-7xl mx-auto px-6 pb-24">
    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-10">

        @forelse($turisticos as $turistico)
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:scale-105 transition">

                <img src="{{ asset('storage/'.$turistico->foto) }}"
                     class="h-52 w-full object-cover"
                     alt="{{ $turistico->nombre }}">

                <div class="p-6">
                    <h3 class="text-2xl font-semibold text-emerald-600 mb-2">
                        {{ $turistico->nombre }}
                    </h3>

                    <p class="text-gray-600 mb-4 line-clamp-3">
                        {{ $turistico->descripcion }}
                    </p>

                    <a href="{{ route('turisticos.show', $turistico->id_sitio) }}"
                       class="text-emerald-600 font-semibold hover:underline">
                        Ver más
                    </a>
                </div>
            </div>
        @empty
            {{-- Sin registros: no se muestra nada --}}
        @endforelse

    </div>
</section>

@include('components.footer')

@endsection
