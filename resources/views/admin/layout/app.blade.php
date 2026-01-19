<!DOCTYPE html>
<html lang="es" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Panel EcoAventura Admin</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Si usas Font Awesome o íconos, agrégalo aquí -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body class="h-full bg-gray-100 font-sans antialiased">

    <div class="flex h-screen overflow-hidden">

        <!-- Sidebar -->
        <aside class="hidden md:flex md:flex-shrink-0">
            <div class="flex flex-col w-64">
                <!-- Logo / Título -->
                <div class="flex items-center h-16 flex-shrink-0 px-4 bg-gray-900 text-white">
                    <span class="text-xl font-bold">EcoAventura Admin</span>
                </div>

                <!-- Menú -->
                <div class="flex flex-col flex-1 overflow-y-auto bg-gray-800">
                    <nav class="flex-1 px-2 py-4 space-y-1">
                        <a href="{{ route('admin.dashboard') }}"
                           class="flex items-center px-4 py-3 text-gray-300 hover:bg-gray-700 hover:text-white rounded-lg transition {{ request()->routeIs('admin.dashboard') ? 'bg-gray-900 text-white' : '' }}">
                            <i class="fas fa-tachometer-alt w-6 mr-3"></i>
                            Dashboard
                        </a>

                        <a href="{{ route('admin.solicitudes.index') }}"
                           class="flex items-center px-4 py-3 text-gray-300 hover:bg-gray-700 hover:text-white rounded-lg transition {{ request()->routeIs('admin.solicitudes.*') ? 'bg-gray-900 text-white' : '' }}">
                            <i class="fas fa-inbox w-6 mr-3"></i>
                            Solicitudes Pendientes
                        </a>

                        <a href="{{ route('admin.destinos.index') }}"
                           class="flex items-center px-4 py-3 text-gray-300 hover:bg-gray-700 hover:text-white rounded-lg transition {{ request()->routeIs('admin.destinos.*') ? 'bg-gray-900 text-white' : '' }}">
                            <i class="fas fa-map-marker-alt w-6 mr-3"></i>
                            Destinos
                        </a>

                        <a href="{{ route('admin.perfil.edit') }}"
                           class="flex items-center px-4 py-3 text-gray-300 hover:bg-gray-700 hover:text-white rounded-lg transition {{ request()->routeIs('admin.perfil.*') ? 'bg-gray-900 text-white' : '' }}">
                            <i class="fas fa-user-circle w-6 mr-3"></i>
                            Mi Perfil
                        </a>
                    </nav>
                </div>
            </div>
        </aside>

        <!-- Contenido principal -->
        <div class="flex flex-col flex-1 w-0 overflow-hidden">

            <!-- Navbar superior -->
            <header class="bg-white shadow-sm">
                <div class="flex justify-between items-center px-6 py-4">
                    <div class="flex items-center">
                        <!-- Botón menú móvil (si quieres responsive sidebar) -->
                        <button class="md:hidden text-gray-500 focus:outline-none">
                            <i class="fas fa-bars text-2xl"></i>
                        </button>
                    </div>

                    <div class="flex items-center space-x-4">
                        <span class="text-gray-700">Hola, {{ auth()->user()->name ?? 'Admin' }}</span>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="text-red-600 hover:text-red-800 font-medium">
                                Cerrar sesión
                            </button>
                        </form>
                    </div>
                </div>
            </header>

            <!-- Área de contenido -->
            <main class="flex-1 overflow-y-auto bg-gray-50">
                @yield('content')
            </main>
        </div>
    </div>

    <!-- Scripts adicionales si necesitas (por ejemplo para confirm delete o alerts) -->
    <script>
        // Confirmación global para deletes si quieres mejorarla
        document.querySelectorAll('form[data-confirm]').forEach(form => {
            form.addEventListener('submit', e => {
                if (!confirm(form.dataset.confirm)) {
                    e.preventDefault();
                }
            });
        });
    </script>
</body>
</html>