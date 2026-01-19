@extends('admin.layout.app')  {{-- Cambia a tu layout real de admin si ya lo tienes --}}

@section('title', 'Destinos - Panel de Administración')

@section('content')
    <div class="p-8">
        <!-- Encabezado -->
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-8 gap-4">
            <h1 class="text-3xl font-bold text-gray-800">Destinos Registrados</h1>
            <a href="{{ route('admin.destinos.create') }}" 
               class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg shadow transition duration-200 flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                </svg>
                Nuevo Destino
            </a>
        </div>

        <!-- Mensajes de éxito -->
        @if (session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded-r">
                {{ session('success') }}
            </div>
        @endif

        <!-- Tabla -->
        <div class="bg-white shadow rounded-lg overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Foto</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Categoría</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ciudad</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Costo</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($destinos as $destino)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if ($destino->foto)
                                        <img src="{{ Storage::url($destino->foto) }}" 
                                             alt="{{ $destino->nombre }}" 
                                             class="h-12 w-16 object-cover rounded">
                                    @else
                                        <span class="text-gray-400 text-sm">Sin foto</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">{{ $destino->nombre }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                        {{ $destino->categoria === 'turistico' ? 'bg-blue-100 text-blue-800' : '' }}
                                        {{ $destino->categoria === 'ecoturistico' ? 'bg-green-100 text-green-800' : '' }}
                                        {{ $destino->categoria === 'balneario' ? 'bg-purple-100 text-purple-800' : '' }}">
                                        {{ $destino->categoria_nombre }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $destino->ciudad ?? '—' }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    {{ $destino->costo ? '$' . number_format($destino->costo, 2) : '—' }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <a href="{{ route('admin.destinos.edit', $destino) }}" 
                                       class="text-indigo-600 hover:text-indigo-900 mr-4">
                                        Editar
                                    </a>
                                    <form action="{{ route('admin.destinos.destroy', $destino) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                onclick="return confirm('¿Realmente quieres eliminar {{ addslashes($destino->nombre) }}? Esta acción no se puede deshacer.')"
                                                class="text-red-600 hover:text-red-900">
                                            Eliminar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-12 text-center text-gray-500">
                                    No hay destinos registrados todavía.
                                    <br><br>
                                    <a href="{{ route('admin.destinos.create') }}" class="text-blue-600 hover:underline">
                                        Crea el primero ahora →
                                    </a>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Paginación -->
            <div class="px-6 py-4 bg-gray-50 border-t border-gray-200">
                {{ $destinos->links() }}
            </div>
        </div>
    </div>
@endsection