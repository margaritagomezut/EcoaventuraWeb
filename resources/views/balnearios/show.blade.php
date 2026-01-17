@extends('layouts.app')

@section('content')

@include('components.navbar')

<!-- HERO -->
<section class="pt-24 relative">
    <img src="{{ asset('storage/'.$balneario->foto) }}"
         class="w-full h-[500px] object-cover"
         alt="{{ $balneario->nombre }}">

    <div class="absolute inset-0 bg-black/50 flex items-center">
        <div class="max-w-7xl mx-auto px-6 text-white">
            <h1 class="text-5xl font-bold mb-4">
                {{ $balneario->nombre }}
            </h1>
            <p class="text-lg max-w-2xl">
                {{ $balneario->direccion ?? '' }},
                {{ $balneario->comunidad ?? '' }},
                {{ $balneario->ciudad ?? '' }}
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
            {{ $balneario->descripcion }}
        </p>

        <!-- DETALLES -->
        <div class="grid sm:grid-cols-2 gap-6">

            <div class="flex items-start gap-4">
                <img src="img/icons/location.png" class="w-8 h-8" alt="Ubicación">
                <div>
                    <h4 class="font-semibold text-lg">Ubicación</h4>
                    <p class="text-gray-600">
                        {{ $balneario->direccion ?? 'No especificada' }}
                    </p>
                </div>
            </div>

            <div class="flex items-start gap-4">
                <img src="img/icons/clock.png" class="w-8 h-8" alt="Horario">
                <div>
                    <h4 class="font-semibold text-lg">Horario</h4>
                    <p class="text-gray-600">
                        {{ $balneario->horario ?? 'No especificado' }}
                    </p>
                </div>
            </div>

            <div class="flex items-start gap-4">
                <img src="img/icons/users.png" class="w-8 h-8" alt="Tipo">
                <div>
                    <h4 class="font-semibold text-lg">Tipo</h4>
                    <p class="text-gray-600">
                        Balneario
                    </p>
                </div>
            </div>

            <div class="flex items-start gap-4">
                <img src="img/icons/phone.png" class="w-8 h-8" alt="Teléfono">
                <div>
                    <h4 class="font-semibold text-lg">Contacto</h4>
                    <p class="text-gray-600">
                        {{ $balneario->telefono ?? 'No disponible' }}
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
                <img src="img/icons/money.png" class="w-6 h-6" alt="Costo">
                <span>
                    <strong>Entrada:</strong>
                    {{ $balneario->costo ? '$'.$balneario->costo : 'Gratuita' }}
                </span>
            </li>

            <li class="flex items-center gap-3">
                <img src="img/icons/location.png" class="w-6 h-6" alt="Ciudad">
                <span>
                    <strong>Ciudad:</strong>
                    {{ $balneario->ciudad ?? 'Ocosingo' }}
                </span>
            </li>

        </ul>

        <a href="{{ route('balnearios.index') }}"
           class="mt-8 inline-block w-full text-center bg-emerald-600 text-white py-3 rounded-xl font-semibold hover:bg-emerald-700 transition">
            Volver a balnearios
        </a>
    </aside>

</section>

@include('components.footer')

@endsection
