@extends('layouts.app')

@section('content')

@include('components.navbar')

<div class="pt-32 pb-20 bg-gray-50 min-h-screen">
    <div class="max-w-md mx-auto bg-white p-8 rounded-xl shadow">

        <h1 class="text-2xl font-bold text-center mb-6">
            Registro de Turista
        </h1>

        <form method="POST" action="{{ route('registro.turista.post') }}" class="space-y-4">
            @csrf

            <input type="text" name="nombre" placeholder="Nombre"
                class="w-full border rounded px-4 py-2" required>

            <input type="text" name="apaterno" placeholder="Apellido paterno"
                class="w-full border rounded px-4 py-2" required>

            <input type="text" name="amaterno" placeholder="Apellido materno"
                class="w-full border rounded px-4 py-2" required>

            <input type="email" name="correo" placeholder="Correo electrónico"
                class="w-full border rounded px-4 py-2" required>

            <input type="password" name="password" placeholder="Contraseña"
                class="w-full border rounded px-4 py-2" required>

            <button
                class="w-full bg-emerald-600 text-white py-2 rounded hover:bg-emerald-700 transition">
                Crear cuenta
            </button>
        </form>

        <p class="text-center text-sm text-gray-600 mt-6">
            ¿Ya tienes cuenta?
            <a href="{{ route('login') }}" class="text-emerald-600 font-semibold">
                Inicia sesión
            </a>
        </p>

    </div>
</div>

@include('components.footer')

@endsection
