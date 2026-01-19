@extends('admin.layout.app')

@section('title', 'Dashboard - Panel EcoAventura')

@section('content')
    <div class="p-8">
        <!-- Encabezado -->
        <div class="mb-10">
            <h1 class="text-3xl font-bold text-gray-800">Bienvenido al Dashboard</h1>
            <p class="text-gray-600 mt-2">Aquí tienes un resumen rápido del estado del sitio.</p>
        </div>

        <!-- Tarjetas de estadísticas -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-10">
            <!-- Destinos totales -->
            <div class="bg-white shadow rounded-lg p-6 border-l-4 border-blue-500">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-500 uppercase">Destinos Registrados</p>
                        <p class="text-3xl font-bold text-gray-900 mt-2">{{ $totalDestinos ?? 0 }}</p>
                    </div>
                    <div class="text-blue-500">
                        <i class="fas fa-map-marker-alt text-5xl opacity-50"></i>
                    </div>
                </div>
                <p class="text-sm text-gray-500 mt-4">
                    <a href="{{ route('admin.destinos.index') }}" class="text-blue-600 hover:underline">Ver todos los destinos →</a>
                </p>
            </div>

            <!-- Solicitudes pendientes -->
            <div class="bg-white shadow rounded-lg p-6 border-l-4 border-yellow-500">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-500 uppercase">Solicitudes Pendientes</p>
                        <p class="text-3xl font-bold text-gray-900 mt-2">{{ $solicitudesPendientes ?? 0 }}</p>
                    </div>
                    <div class="text-yellow-500">
                        <i class="fas fa-exclamation-triangle text-5xl opacity-50"></i>
                    </div>
                </div>
                <p class="text-sm text-gray-500 mt-4">
                    <a href="{{ route('admin.solicitudes.index') }}" class="text-yellow-600 hover:underline">Revisar solicitudes →</a>
                </p>
            </div>

            <!-- Último destino agregado -->
            <div class="bg-white shadow rounded-lg p-6 border-l-4 border-green-500">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-500 uppercase">Último Destino</p>
                        <p class="text-xl font-semibold text-gray-900 mt-2 truncate max-w-[200px]">
                            {{ $ultimoDestino->nombre ?? 'Ninguno aún' }}
                        </p>
                        <p class="text-sm text-gray-500 mt-1">
                            {{ $ultimoDestino->created_at ? $ultimoDestino->created_at->diffForHumans() : '' }}
                        </p>
                    </div>
                    <div class="text-green-500">
                        <i class="fas fa-plus-circle text-5xl opacity-50"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Acciones rápidas -->
        <div class="bg-white shadow rounded-lg p-6">
            <h2 class="text-xl font-semibold mb-4">Acciones rápidas</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                <a href="{{ route('admin.destinos.create') }}" 
                   class="block bg-blue-50 hover:bg-blue-100 p-6 rounded-lg text-center transition">
                    <i class="fas fa-plus-circle text-blue-600 text-4xl mb-3"></i>
                    <p class="font-medium">Agregar Nuevo Destino</p>
                </a>

                <a href="{{ route('admin.solicitudes.index') }}" 
                   class="block bg-yellow-50 hover:bg-yellow-100 p-6 rounded-lg text-center transition">
                    <i class="fas fa-tasks text-yellow-600 text-4xl mb-3"></i>
                    <p class="font-medium">Revisar Solicitudes</p>
                </a>

                <a href="{{ route('admin.perfil.edit') }}" 
                   class="block bg-purple-50 hover:bg-purple-100 p-6 rounded-lg text-center transition">
                    <i class="fas fa-user-cog text-purple-600 text-4xl mb-3"></i>
                    <p class="font-medium">Editar Mi Perfil</p>
                </a>
            </div>
        </div>
    </div>
@endsection