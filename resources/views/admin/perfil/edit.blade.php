@extends('layouts.admin')

@section('content')

<div class="max-w-3xl mx-auto px-6 py-8">
    <h1 class="text-3xl font-bold text-emerald-800 mb-8">Mi Perfil</h1>

    <div class="bg-white rounded-xl shadow p-8">
        <form method="POST" action="{{ route('admin.perfil.update') }}">
            @csrf
            @method('PUT')

            <!-- Nombre -->
            <div class="mb-6">
                <label class="block text-gray-700 font-medium mb-2">Nombre completo</label>
                <input type="text" name="nombre" value="{{ old('nombre', $usuario->nombre) }}"
                       class="w-full px-4 py-3 border rounded-lg focus:ring-emerald-500 focus:border-emerald-500">
                @error('nombre') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Correo -->
            <div class="mb-6">
                <label class="block text-gray-700 font-medium mb-2">Correo electrónico</label>
                <input type="email" name="correo" value="{{ old('correo', $usuario->correo) }}"
                       class="w-full px-4 py-3 border rounded-lg focus:ring-emerald-500 focus:border-emerald-500">
                @error('correo') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Password (opcional) -->
            <div class="mb-6">
                <label class="block text-gray-700 font-medium mb-2">Nueva contraseña (dejar en blanco si no deseas cambiar)</label>
                <input type="password" name="password"
                       class="w-full px-4 py-3 border rounded-lg focus:ring-emerald-500 focus:border-emerald-500">
                @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 font-medium mb-2">Confirmar nueva contraseña</label>
                <input type="password" name="password_confirmation"
                       class="w-full px-4 py-3 border rounded-lg focus:ring-emerald-500 focus:border-emerald-500">
            </div>

            <button type="submit" class="bg-emerald-600 text-white px-8 py-3 rounded-lg hover:bg-emerald-700 transition">
                Guardar Cambios
            </button>
        </form>
    </div>
</div>

@endsection