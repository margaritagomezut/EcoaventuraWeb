@extends('layouts.admin')

@section('content')

<div class="max-w-7xl mx-auto px-6 py-8">
    <h1 class="text-3xl font-bold text-emerald-800 mb-8">Solicitudes Pendientes</h1>

    @if($solicitudes->isEmpty())
        <div class="bg-white p-8 rounded-xl shadow text-center text-gray-500">
            No hay solicitudes pendientes en este momento
        </div>
    @else
        <div class="bg-white rounded-xl shadow overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nombre</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Correo</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Rol</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Acciones</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($solicitudes as $solicitud)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            {{ $solicitud->hotelero?->nombre ?? $solicitud->restaurantero?->nombre ?? 'Sin nombre' }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $solicitud->correo }}</td>
                        <td class="px-6 py-4 whitespace-nowrap capitalize">{{ $solicitud->rol }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                            <form action="{{ route('admin.solicitudes.aprobar', $solicitud) }}" method="POST" class="inline">
                                @csrf
                                @method('POST')
                                <button type="submit" class="text-green-600 hover:text-green-900 mr-3">Aprobar</button>
                            </form>
                            
                            <form action="{{ route('admin.solicitudes.rechazar', $solicitud) }}" method="POST" class="inline">
                                @csrf
                                @method('POST')
                                <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('¿Realmente deseas rechazar esta solicitud?')">Rechazar</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>

@endsection