@extends('layouts.app')

@section('content')

@include('components.navbar')

<!-- HERO -->
<section class="pt-24 relative">
    <img src="{{ asset('img/balnearios/encanto-1.png') }}"
         class="w-full h-[500px] object-cover"
         alt="Balnearios Ocosingo">

    <div class="absolute inset-0 bg-black/50 flex items-center">
        <div class="max-w-7xl mx-auto px-6 text-white">
            <h1 class="text-5xl font-bold mb-4">
                Disfruta de los Mejores Balnearios
            </h1>
            <p class="text-lg max-w-2xl">
                Refresca tu día, disfruta el momento
            </p>
        </div>
    </div>
</section>

<!-- DESCRIPCIÓN -->
<section class="max-w-7xl mx-auto px-6 py-16">
    <p class="text-gray-700 text-lg leading-relaxed max-w-3xl">
        Los balnearios de Ocosingo ofrecen espacios ideales para el descanso
        y la convivencia familiar, con aguas cristalinas y entornos naturales.
    </p>
</section>

<!-- GRID DE BALNEARIOS -->
<section class="max-w-7xl mx-auto px-6 pb-24">
    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-10">

        @forelse($balnearios as $balneario)
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:scale-105 transition">
                <img src="{{ asset('storage/'.$balneario->foto) }}"
                     class="h-52 w-full object-cover"
                     alt="{{ $balneario->nombre }}">

                <div class="p-6">
                    <h3 class="text-2xl font-semibold text-emerald-600 mb-2">
                        {{ $balneario->nombre }}
                    </h3>

                    <p class="text-gray-600 mb-4 line-clamp-3">
                        {{ $balneario->descripcion }}
                    </p>

                    <a href="{{ route('balnearios.show', $balneario->id_sitio) }}"
                       class="text-emerald-600 font-semibold hover:underline">
                        Ver más
                    </a>
                </div>
            </div>
        @empty
            {{-- No mostramos nada visual --}}
        @endforelse

    </div>
</section>

@include('components.footer')

@endsection

