<nav x-data="{ open: false }" class="bg-white shadow-md fixed w-full z-50 min-h-[64px]">

    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">

        <!-- Logo -->
        <a href="{{ url('/') }}" class="flex items-center space-x-2">
            <img src="{{ asset('img/logo-nv.png') }}" alt="Ecoaventura" class="h-20 w-auto">
            <span class="text-2xl font-bold text-emerald-600">Ecoaventura</span>
        </a>

        <!-- Menú Desktop -->
        <div class="hidden md:flex space-x-6 items-center">

            <!-- Inicio -->
            <a href="{{ route('inicio') }}" class="text-gray-700 hover:text-emerald-600 font-medium">
                Inicio
            </a>

            <!-- Destinos Dropdown Mejorado -->
            <div x-data="{ openDest: false, timeout: null }" x-cloak class="relative" @mouseenter="clearTimeout(timeout); openDest = true"
                @mouseleave="timeout = setTimeout(() => openDest = false, 200)">
                <button class="text-gray-700 hover:text-emerald-600 font-medium flex items-center gap-1">
                    Destinos
                    <svg class="w-4 h-4 inline-block" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M5.23 7.21a.75.75 0 011.06.02L10 10.939l3.71-3.71a.75.75 0 011.08 1.04l-4.25 4.25a.75.75 0 01-1.08 0l-4.25-4.25a.75.75 0 01.02-1.06z"
                            clip-rule="evenodd" />
                    </svg>
                </button>

                <div x-show="openDest" x-transition.opacity.duration.200ms
                    class="absolute mt-2 w-48 bg-white shadow-lg rounded-lg py-2 z-50">
                    <a href="{{ route('turisticos.index') }}"
                        class="block px-4 py-2 text-gray-700 hover:bg-emerald-100">Turísticos</a>
                    <a href="{{ route('ecoturisticos.index') }}"
                        class="block px-4 py-2 text-gray-700 hover:bg-emerald-100">Ecoturísticos</a>
                    <a href="{{ route('balnearios.index') }}"
                        class="block px-4 py-2 text-gray-700 hover:bg-emerald-100">Balnearios</a>
                </div>
            </div>

            <!-- Servicios Dropdown Mejorado -->
            <div x-data="{ openServ: false, timeout: null }" x-cloak class="relative" @mouseenter="clearTimeout(timeout); openServ = true"
                @mouseleave="timeout = setTimeout(() => openServ = false, 200)">
                <button class="text-gray-700 hover:text-emerald-600 font-medium flex items-center gap-1">
                    <a href="{{ route('servicios.index') }}">
                    Servicios
                    </a>
                    <svg class="w-4 h-4 inline-block" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M5.23 7.21a.75.75 0 011.06.02L10 10.939l3.71-3.71a.75.75 0 011.08 1.04l-4.25 4.25a.75.75 0 01-1.08 0l-4.25-4.25a.75.75 0 01.02-1.06z"
                            clip-rule="evenodd" />
                    </svg>
                </button>

                <div x-show="openServ" x-transition.opacity.duration.200ms
                    class="absolute mt-2 w-48 bg-white shadow-lg rounded-lg py-2 z-50">
                    <a href="{{ route('servicios.hoteles') }}"
                        class="block px-4 py-2 text-gray-700 hover:bg-emerald-100">Hoteles</a>
                    <a href="{{ route('servicios.restaurantes') }}"
                        class="block px-4 py-2 text-gray-700 hover:bg-emerald-100">Restaurantes</a>
                </div>
            </div>


            <!-- Contacto -->
            <a href="{{ route('contacto') }}" class="text-gray-700 hover:text-emerald-600 font-medium">
                Contacto
            </a>

        </div>

        <!-- Botón login desktop -->
        <a href="{{ route('login') }}" class="hidden md:block bg-emerald-600 text-white px-4 py-2 rounded-lg hover:bg-emerald-700">
            Iniciar sesión
        </a>

        <!-- Botón móvil -->
        <button @click="open = !open" class="md:hidden text-gray-700">
            ☰
        </button>
    </div>

    <!-- Menú móvil -->
    <div x-show="open" x-transition class="md:hidden bg-white border-t">
        <div class="px-6 py-4 space-y-4">

            <a href="{{ route('inicio') }}" class="block text-gray-700">Inicio</a>

            <!-- Destinos móvil -->
            <div x-data="{ openDestMobile: false }" x-cloak>
                <button @click="openDestMobile = !openDestMobile"
                    class="w-full text-left flex justify-between items-center text-gray-700">
                    Destinos
                    <span x-text="openDestMobile ? '▲' : '▼'"></span>
                </button>
                <div x-show="openDestMobile" x-transition class="pl-4 mt-2 space-y-2">
                    <a href="{{ route('turisticos.index') }}" class="block text-gray-700">Turísticos</a>
                    <a href="{{ route('ecoturisticos.index') }}" class="block text-gray-700">Ecoturísticos</a>
                    <a href="{{ route('balnearios.index') }}" class="block text-gray-700">Balnearios</a>
                </div>
            </div>

            <!-- Servicios móvil -->
            <div x-data="{ openServMobile: false }" x-cloak>
                <button @click="openServMobile = !openServMobile"
                    class="w-full text-left flex justify-between items-center text-gray-700">
                    Servicios
                    <span x-text="openServMobile ? '▲' : '▼'"></span>
                </button>
                <div x-show="openServMobile" x-transition class="pl-4 mt-2 space-y-2">
                    <a href="{{ route('servicios.hoteles') }}" class="block text-gray-700">Hoteles</a>
                    <a href="{{ route('servicios.restaurantes') }}" class="block text-gray-700">Restaurantes</a>
                </div>
            </div>

            <a href="{{ route('contacto') }}" class="block text-gray-700">Contacto</a>

            <a href="/login" class="block text-center bg-emerald-600 text-white py-2 rounded-lg">
                Iniciar sesión
            </a>
        </div>
    </div>
</nav>

<!-- Alpine.js -->
<script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

<style>
    [x-cloak] {
        display: none !important;
    }
</style>
