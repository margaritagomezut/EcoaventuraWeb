<footer class="bg-gray-900 text-gray-300">
    <div class="max-w-7xl mx-auto px-6 py-12 grid gap-8 md:grid-cols-3 text-center md:text-left">

        <!-- Columna 1: Sobre Ecoaventura -->
        <div>
            <h3 class="text-xl font-semibold text-white mb-2">Ecoaventura</h3>
            <p class="text-sm">
                Descubre Ocosingo y vive la naturaleza, cultura y aventura.
            </p>
        </div>

        <!-- Columna 2: Enlaces (solo texto) -->
        <div>
            <h4 class="font-semibold text-white mb-2">Enlaces</h4>
            <ul class="space-y-2 text-sm">
                <li><a href="{{ url('/') }}" class="hover:text-white">Inicio</a></li>
                <li><a href="{{ url('/destinos') }}" class="hover:text-white">Destinos</a></li>
                <li><a href="{{ url('servicios.index') }}" class="hover:text-white">Servicios</a></li>
                <li><a href="{{ url('/contacto') }}" class="hover:text-white">Contacto</a></li>
            </ul>
        </div>

        <!-- Columna 3: Redes sociales / contacto con iconos -->
        <div>
            <h4 class="font-semibold text-white mb-2">Síguenos</h4>
            <ul class="flex justify-center md:justify-start space-x-4">
                <li>
                    <a href="https://www.facebook.com" target="_blank" class="flex items-center gap-2 hover:text-white">
                        <img src="{{ asset('img/icons/facebookbn.png') }}" class="h-5 w-5" alt="Facebook">
                        Facebook
                    </a>
                </li>
                <li>
                    <a href="https://www.instagram.com" target="_blank" class="flex items-center gap-2 hover:text-white">
                        <img src="{{ asset('img/icons/instagrambn.png') }}" class="h-5 w-5" alt="Instagram">
                        Instagram
                    </a>
                </li>
                <li>
                    <a href="mailto:ecoaventura@gmail.com" class="flex items-center gap-2 hover:text-white">
                        <img src="{{ asset('img/icons/twitter.png') }}" class="h-5 w-5" alt="Email">
                        ecoaventura@gmail.com
                    </a>
                </li>
            </ul>
        </div>

    </div>

    <!-- Pie de página -->
    <div class="text-center text-xs text-gray-500 py-4 border-t border-gray-700">
        © {{ date('Y') }} Ecoaventura. Todos los derechos reservados.
    </div>
</footer>
