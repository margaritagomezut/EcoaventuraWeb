<!DOCTYPE html>
<html lang="es" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Panel Admin | EcoAventura</title>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Tailwind + tus estilos personalizados -->
</head>
<body class="bg-gray-50 min-h-screen font-sans antialiased">

    <!-- Navbar Admin -->
    <nav class="bg-emerald-800 text-white shadow-lg fixed w-full z-50">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex justify-between h-16 items-center">
                <!-- Logo / Nombre -->
                <div class="flex items-center gap-3">
                    <a href="{{ route('admin.dashboard') }}" class="font-bold text-xl tracking-wide">
                        EcoAventura <span class="text-emerald-300">Admin</span>
                    </a>
                </div>

                <!-- Menú principal -->
                <div class="hidden md:flex items-center gap-8">
                    <a href="{{ route('admin.dashboard') }}"
                       class="hover:text-emerald-300 transition {{ request()->routeIs('admin.dashboard') ? 'text-emerald-300 font-semibold' : '' }}">
                        Dashboard
                    </a>

                    <a href="{{ route('admin.solicitudes') }}"
                       class="hover:text-emerald-300 transition {{ request()->routeIs('admin.solicitudes*') ? 'text-emerald-300 font-semibold' : '' }}">
                        Solicitudes Pendientes
                    </a>

                    <div class="relative group">
                        <button class="hover:text-emerald-300 transition flex items-center gap-1">
                            Gestión de Contenido
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <div class="absolute hidden group-hover:block bg-white text-gray-800 shadow-xl rounded-lg mt-2 w-64 py-2">
                            <a href="{{ route('admin.destinos.index') }}" class="block px-4 py-2 hover:bg-gray-100">Destinos Turísticos</a>
                            <a href="{{ route('admin.ecoturisticos.index') }}" class="block px-4 py-2 hover:bg-gray-100">Ecoturísticos / Balnearios</a>
                            <!-- Agrega más si tienes otros recursos -->
                        </div>
                    </div>

                    <a href="{{ route('admin.perfil') }}"
                       class="hover:text-emerald-300 transition {{ request()->routeIs('admin.perfil') ? 'text-emerald-300 font-semibold' : '' }}">
                        Mi Perfil
                    </a>
                </div>

                <!-- Botón cerrar sesión + avatar -->
                <div class="flex items-center gap-4">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="hover:text-emerald-300 transition">
                            Cerrar sesión
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Contenido principal con padding para navbar fija -->
    <main class="pt-20 pb-12">
        @yield('content')
    </main>

    <!-- Footer simple para admin -->
    <footer class="bg-emerald-900 text-white py-6 text-center text-sm">
        <p>© {{ date('Y') }} EcoAventura - Panel de Administración</p>
    </footer>

</body>
</html>