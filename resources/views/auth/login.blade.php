@extends('layouts.app')

@section('content')

@include('components.navbar')

<section class="min-h-screen flex items-center justify-center bg-gray-100 pt-24 pb-20">
    <div class="max-w-md w-full bg-white rounded-2xl shadow-xl p-8">

        <h2 class="text-3xl font-bold text-center text-emerald-700 mb-6">
            Iniciar sesión
        </h2>

        {{-- ERRORES --}}
        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-3 rounded mb-4 text-sm">
                {{ $errors->first() }}
            </div>
        @endif

        {{-- MENSAJE DE ÉXITO --}}
        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4 text-sm">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login.post') }}" class="space-y-5">
            @csrf

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">
                    Correo electrónico
                </label>
                <input
                    type="email"
                    name="correo"
                    class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-emerald-500"
                    required
                >
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">
                    Contraseña
                </label>
                <input
                    type="password"
                    name="password"
                    class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-emerald-500"
                    required
                >
            </div>

            <button
                type="submit"
                class="w-full bg-emerald-600 text-white py-2 rounded-lg font-semibold hover:bg-emerald-700 transition"
            >
                Entrar
            </button>
        </form>

        <div class="mt-6 text-center text-sm text-gray-600 space-y-2">
            <p>
                <a href="{{ route('password.request') }}"
                   class="text-emerald-600 font-semibold hover:underline">
                    ¿Olvidaste tu contraseña?
                </a>
            </p>

            <p>
                ¿No tienes cuenta?
                <a href="{{ route('registro') }}"
                   class="text-emerald-600 font-semibold hover:underline">
                    Regístrate
                </a>
            </p>
        </div>
    </div>
</section>

@include('components.footer')

@endsection

