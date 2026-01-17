@extends('layouts.app')

@section('title', 'Editar servicio | Ecoaventura')

@section('content')

@include('components.navbar')

<!-- HERO -->
<section class="pt-24 relative">
    <img src="{{ asset('img/servicios/editar-hero.jpg') }}"
         class="w-full h-[260px] object-cover"
         alt="Editar servicio">

    <div class="absolute inset-0 bg-black/60 flex items-center">
        <div class="max-w-7xl mx-auto px-6 text-white">
            <h1 class="text-4xl font-bold mb-2">
                Editar servicio
            </h1>
            <p class="text-lg max-w-2xl">
                Actualiza la información de tu hotel o restaurante
            </p>
        </div>
    </div>
</section>

<!-- FORMULARIO -->
<section class="max-w-5xl mx-auto px-6 py-16">
    <div class="bg-white rounded-2xl shadow-lg p-8">

        <h2 class="text-2xl font-semibold text-emerald-600 mb-6">
            Información del servicio
        </h2>

        <form action="#" method="POST" enctype="multipart/form-data">
            {{-- @csrf --}}
            {{-- @method('PUT') --}}

            <!-- Tipo -->
            <div class="mb-6">
                <label class="block font-semibold mb-2">
                    Tipo de servicio
                </label>
                <select class="w-full border rounded-lg p-3">
                    <option selected>Hotel</option>
                    <option>Restaurante</option>
                </select>
            </div>

            <!-- Nombre -->
            <div class="mb-6">
                <label class="block font-semibold mb-2">
                    Nombre
                </label>
                <input type="text"
                       class="w-full border rounded-lg p-3"
                       value="Hotel Selva Maya">
            </div>

            <!-- Descripción -->
            <div class="mb-6">
                <label class="block font-semibold mb-2">
                    Descripción
                </label>
                <textarea rows="4"
                          class="w-full border rounded-lg p-3">Comodidad y descanso rodeado de naturaleza.</textarea>
            </div>

            <!-- Dirección -->
            <div class="mb-6">
                <label class="block font-semibold mb-2">
                    Dirección
                </label>
                <input type="text"
                       class="w-full border rounded-lg p-3"
                       value="Centro de Ocosingo">
            </div>

            <!-- Precio -->
            <div class="mb-6">
                <label class="block font-semibold mb-2">
                    Precio aproximado
                </label>
                <input type="number"
                       class="w-full border rounded-lg p-3"
                       value="850">
            </div>

            <!-- Contacto -->
            <div class="grid sm:grid-cols-2 gap-6 mb-6">
                <div>
                    <label class="block font-semibold mb-2">
                        Teléfono
                    </label>
                    <input type="text"
                           class="w-full border rounded-lg p-3"
                           value="9190000000">
                </div>

                <div>
                    <label class="block font-semibold mb-2">
                        WhatsApp
                    </label>
                    <input type="text"
                           class="w-full border rounded-lg p-3"
                           value="9190000000">
                </div>
            </div>

            <!-- IMÁGENES -->
            <div class="mb-8">
                <label class="block font-semibold mb-2">
                    Cambiar imágenes
                </label>
                <input type="file"
                       multiple
                       class="w-full border rounded-lg p-3">

                <p class="text-sm text-gray-500 mt-2">
                    Si no subes nuevas imágenes, se conservarán las actuales
                </p>
            </div>

            <!-- BOTONES -->
            <div class="flex justify-between items-center">
                <a href="#"
                   class="text-gray-600 hover:underline">
                    Cancelar
                </a>

                <button type="submit"
                        class="bg-emerald-600 text-white px-8 py-3 rounded-lg hover:bg-emerald-700">
                    Guardar cambios
                </button>
            </div>

            {{-- FUTURO:
                - Validaciones
                - Actualizar BD
                - Control de permisos
            --}}
        </form>

    </div>
</section>

@include('components.footer')

@endsection
