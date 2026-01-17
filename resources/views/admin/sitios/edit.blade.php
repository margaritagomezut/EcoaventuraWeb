@extends('layouts.app')

@section('content')

@include('components.navbar')

<section class="pt-32 pb-20">
    <div class="max-w-3xl mx-auto px-6">

        <h1 class="text-4xl font-bold text-emerald-700 mb-8">
            Editar destino
        </h1>

        <form action="{{ route('sitios.update', $sitio->id) }}" method="POST" enctype="multipart/form-data"
              class="bg-white shadow-xl rounded-3xl p-8 space-y-6">
            @csrf
            @method('PUT') <!-- Muy importante para que Laravel sepa que es update -->

            <input type="text" name="nombre" placeholder="Nombre"
                   class="w-full border rounded-xl p-3" value="{{ $sitio->nombre }}" required>

            <select name="categoria" class="w-full border rounded-xl p-3" required>
                <option value="">Selecciona categoría</option>
                <option value="Balneario" {{ $sitio->categoria == 'Balneario' ? 'selected' : '' }}>Balneario</option>
                <option value="Ecoturistico" {{ $sitio->categoria == 'Ecoturistico' ? 'selected' : '' }}>Ecoturístico</option>
                <option value="Turistico" {{ $sitio->categoria == 'Turistico' ? 'selected' : '' }}>Turístico</option>
            </select>

            <textarea name="descripcion" rows="4" placeholder="Descripción"
                      class="w-full border rounded-xl p-3" required>{{ $sitio->descripcion }}</textarea>

            <input type="text" name="direccion" placeholder="Dirección"
                   class="w-full border rounded-xl p-3" value="{{ $sitio->direccion }}">

            <input type="text" name="comunidad" placeholder="Comunidad"
                   class="w-full border rounded-xl p-3" value="{{ $sitio->comunidad }}">

            <input type="text" name="ciudad" placeholder="Ciudad"
                   class="w-full border rounded-xl p-3" value="{{ $sitio->ciudad }}">

            <input type="text" name="telefono" placeholder="Teléfono"
                   class="w-full border rounded-xl p-3" value="{{ $sitio->telefono }}">

            <input type="text" name="horario" placeholder="Horario"
                   class="w-full border rounded-xl p-3" value="{{ $sitio->horario }}">

            <input type="number" name="costo" placeholder="Costo"
                   class="w-full border rounded-xl p-3" value="{{ $sitio->costo }}">

            <p class="text-sm text-gray-500">Si deseas cambiar la foto, sube una nueva:</p>
            <input type="file" name="foto" class="w-full">

            <button type="submit"
                    class="w-full bg-emerald-600 text-white py-3 rounded-xl font-semibold hover:bg-emerald-700">
                Actualizar destino
            </button>
        </form>

    </div>
</section>

@include('components.footer')

@endsection
