@extends('admin.layout.app')  {{-- Cambia a tu layout real de admin si ya lo tienes --}}

@section('title', 'Editar Destino: ' . $destino->nombre . ' - Panel Admin')

@section('content')
    <div class="p-8">
        <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="bg-gray-800 text-white px-6 py-4">
                <h1 class="text-2xl font-bold">Editar Destino</h1>
                <p class="text-gray-300 mt-1">Modifica los datos del destino: {{ $destino->nombre }}</p>
            </div>

            @if ($errors->any())
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mt-4 mx-6">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.destinos.update', $destino) }}" method="POST" enctype="multipart/form-data" class="p-6">
                @csrf
                @method('PUT')

                <!-- Nombre -->
                <div class="mb-6">
                    <label for="nombre" class="block text-gray-700 font-medium mb-2">Nombre del Destino *</label>
                    <input type="text" name="nombre" id="nombre" value="{{ old('nombre', $destino->nombre) }}" required
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <!-- Categoría -->
                <div class="mb-6">
                    <label for="categoria" class="block text-gray-700 font-medium mb-2">Categoría *</label>
                    <select name="categoria" id="categoria" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="turistico" {{ old('categoria', $destino->categoria) === 'turistico' ? 'selected' : '' }}>Turístico</option>
                        <option value="ecoturistico" {{ old('categoria', $destino->categoria) === 'ecoturistico' ? 'selected' : '' }}>Ecoturístico</option>
                        <option value="balneario" {{ old('categoria', $destino->categoria) === 'balneario' ? 'selected' : '' }}>Balneario</option>
                    </select>
                </div>

                <!-- Descripción -->
                <div class="mb-6">
                    <label for="descripcion" class="block text-gray-700 font-medium mb-2">Descripción</label>
                    <textarea name="descripcion" id="descripcion" rows="5"
                              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('descripcion', $destino->descripcion) }}</textarea>
                </div>

                <!-- Dirección -->
                <div class="mb-6">
                    <label for="direccion" class="block text-gray-700 font-medium mb-2">Dirección</label>
                    <input type="text" name="direccion" id="direccion" value="{{ old('direccion', $destino->direccion) }}"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <!-- Horario -->
                <div class="mb-6">
                    <label for="horario" class="block text-gray-700 font-medium mb-2">Horario de atención</label>
                    <input type="text" name="horario" id="horario" value="{{ old('horario', $destino->horario) }}"
                           placeholder="Ej: Lunes a Domingo 8:00 - 18:00"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <!-- Teléfono -->
                <div class="mb-6">
                    <label for="telefono" class="block text-gray-700 font-medium mb-2">Teléfono</label>
                    <input type="text" name="telefono" id="telefono" value="{{ old('telefono', $destino->telefono) }}"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <!-- Comunidad -->
                <div class="mb-6">
                    <label for="comunidad" class="block text-gray-700 font-medium mb-2">Comunidad</label>
                    <input type="text" name="comunidad" id="comunidad" value="{{ old('comunidad', $destino->comunidad) }}"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <!-- Ciudad -->
                <div class="mb-6">
                    <label for="ciudad" class="block text-gray-700 font-medium mb-2">Ciudad</label>
                    <input type="text" name="ciudad" id="ciudad" value="{{ old('ciudad', $destino->ciudad) }}"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <!-- Costo -->
                <div class="mb-6">
                    <label for="costo" class="block text-gray-700 font-medium mb-2">Costo de entrada (MXN)</label>
                    <input type="number" name="costo" id="costo" value="{{ old('costo', $destino->costo) }}" step="0.01" min="0"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <!-- Foto actual + opción para reemplazar -->
                <div class="mb-6">
                    <label class="block text-gray-700 font-medium mb-2">Foto actual</label>
                    @if ($destino->foto)
                        <img src="{{ Storage::url($destino->foto) }}" alt="{{ $destino->nombre }}" class="w-48 h-32 object-cover rounded mb-2 border border-gray-300">
                        <p class="text-sm text-gray-500">Foto actual (puedes reemplazarla abajo)</p>
                    @else
                        <p class="text-sm text-gray-500">No hay foto cargada aún</p>
                    @endif
                </div>

                <div class="mb-6">
                    <label for="foto" class="block text-gray-700 font-medium mb-2">Reemplazar foto (opcional)</label>
                    <input type="file" name="foto" id="foto" accept="image/*"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                    <p class="text-sm text-gray-500 mt-1">Formatos: JPG, PNG, GIF. Máximo 2MB. (La foto anterior se eliminará automáticamente)</p>
                </div>

                <!-- Botones -->
                <div class="flex justify-end gap-4 mt-8">
                    <a href="{{ route('admin.destinos.index') }}"
                       class="px-6 py-2 bg-gray-300 text-gray-800 rounded-lg hover:bg-gray-400 transition">
                        Cancelar
                    </a>
                    <button type="submit"
                            class="px-6 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition font-medium">
                        Actualizar Destino
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection