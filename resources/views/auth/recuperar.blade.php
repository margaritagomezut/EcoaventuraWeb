@extends('layouts.app')

@section('content')
@include('components.navbar')

<section class="min-h-screen flex items-center justify-center bg-emerald-50 pt-24">
    <div class="bg-white w-full max-w-md p-8 rounded-2xl shadow-lg">

        <h2 class="text-2xl font-bold text-center text-emerald-700 mb-6">
            Recuperar contraseña
        </h2>

        <form method="POST" action="{{ route('password.update') }}" class="space-y-4">
            @csrf

            <div>
                <label class="block text-sm font-medium text-gray-700">Correo</label>
                <input type="email" name="correo" required
                    class="w-full mt-1 px-4 py-2 border rounded-lg">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Nueva contraseña</label>
                <input type="password" name="password" required
                    class="w-full mt-1 px-4 py-2 border rounded-lg">
            </div>

            <button
                class="w-full bg-emerald-600 text-white py-2 rounded-lg font-semibold hover:bg-emerald-700 transition">
                Actualizar contraseña
            </button>
        </form>

        <p class="mt-4 text-center text-sm">
            <a href="{{ route('login') }}" class="text-emerald-600 hover:underline">
                Volver al login
            </a>
        </p>
    </div>
</section>

@include('components.footer')
@endsection
