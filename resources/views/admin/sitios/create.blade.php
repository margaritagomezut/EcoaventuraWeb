@extends('layouts.app')

@section('content')

@include('components.navbar')

<section class="pt-32 pb-20">
    <div class="max-w-3xl mx-auto px-6">

        <h1 class="text-4xl font-bold text-emerald-700 mb-8">
            Crear destino
        </h1>

        <form action="{{ route('sitios.store') }}" method="POST" enctype="multipart/form-data"
              class="bg-white shadow-xl rounded-3xl p-8 space-y-6">
            @csrf

            <input type="text" name="nombre" placeholder="Nombre"
                   class="w-full border rounded-xl p-3" required>

            <select name="categoria" class="w-full border rounded-xl p-3" required>
                <option value="">Selecciona categoría</option>
                <option value="Balneario">Balneario</option>
                <option value="Ecoturistico">Ecoturístico</option>
                <option value="Turistico">Turístico</option>
            </select>

            <textarea name="descripcion" rows="4" placeholder="Descripción"
                      class="w-full border rounded-xl p-3" required></textarea>

            <input type="text" name="direccion" placeholder="Dirección"
                   class="w-full border rounded-xl p-3">

            <input type="text" name="comunidad" placeholder="Comunidad"
                   class="w-full border rounded-xl p-3">

            <input type="text" name="ciudad" placeholder="Ciudad"
                   class="w-full border rounded-xl p-3">

            <input type="text" name="telefono" placeholder="Teléfono"
                   class="w-full border rounded-xl p-3">

            <input type="text" name="horario" placeholder="Horario"
                   class="w-full border rounded-xl p-3">

            <input type="number" name="costo" placeholder="Costo"
                   class="w-full border rounded-xl p-3">

            <input type="file" name="foto" class="w-full">

            <button type="submit"
                    class="w-full bg-emerald-600 text-white py-3 rounded-xl font-semibold hover:bg-emerald-700">
                Guardar destino
            </button>
        </form>

    </div>
</section>

@include('components.footer')

@endsection
