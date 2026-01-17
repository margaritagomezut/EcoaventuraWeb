@extends('layouts.app')

@section('content')

@include('components.navbar')

<!-- HERO / IMAGEN PRINCIPAL -->
<section class="relative pt-[104px]">
    <img src="{{ asset('img/tonina2.jpg') }}"
         class="w-full h-[500px] object-cover" alt="Ocosingo">

    <div class="absolute inset-0 bg-black/50 flex items-center justify-center">
        <div class="text-center text-white px-6">
            <h1 class="text-5xl font-bold mb-4">BIENVENIDOS A ECOAVENTURA</h1>
            <p class="text-xl italic">
                “Aventura, cultura y tradición en un solo lugar”
            </p>

            <div class="mt-8 flex justify-center gap-4">
                <a href="#destinos"
                   class="bg-emerald-600 hover:bg-emerald-700 px-6 py-3 rounded-full font-semibold transition">
                    Explorar destinos
                </a>

                <a href="#servicios"
                   class="border border-white px-6 py-3 rounded-full font-semibold hover:bg-white hover:text-black transition">
                    Servicios
                </a>
        </div>
    </div>
</section>

<!-- FRASE -->
<div class="text-center my-20">
    <span class="text-emerald-600 text-4xl"></span>

    <p class="text-xl italic text-gray-600 max-w-2xl mx-auto">
        Experiencias que conectan con la esencia de Ocosingo.
    </p> <span class="text-emerald-600 text-4xl"></span>
</div>

<!-- IMÁGENES DESTACADAS -->
<section class="max-w-7xl mx-auto px-6 grid md:grid-cols-3 gap-8 mb-24">
    @foreach ([
        ['img'=>'calles-index.jpg','text'=>'Calles que guardan historia'],
        ['img'=>'cultura.jpg','text'=>'Cultura que habla raíces'],
        ['img'=>'tradiciones.jpg','text'=>'Entre montañas y tradiciones']
    ] as $item)
        <div class="relative overflow-hidden rounded-2xl shadow-lg group">
            <img src="{{ asset('img/'.$item['img']) }}"
                 class="w-full h-64 object-cover group-hover:scale-110 transition duration-500"
                 alt="">

        <div class="absolute inset-0 bg-black/40 flex items-end p-4">      
            <p class="text-white font-semibold">
                {{ $item['text'] }}
            </p>
            </div>   
        </div>
    @endforeach
</section>

<!-- OCOSINGO TIERRA DE AVENTURA -->
<section class="bg-gray-100 py-24">
    <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-2 gap-12 items-center">

        <div>
            <span class="inline-block mb-4 text-sm uppercase tracking-widest text-emerald-600">
                Descubre Ocosingo
            </span>
            <h2 class="text-4xl font-bold text-emerald-700 mb-6">
                Ocosingo, tierra de aventura y cultura viva
            </h2>

            <p class="text-gray-700 mb-8">
                Entre selva, ríos y tradiciones, Ocosingo conserva el alma
                del pueblo tzeltal y ofrece experiencias únicas al visitante.
            </p>

            <div class="grid sm:grid-cols-2 gap-6">
                <div>
                    <h3 class="font-semibold text-lg text-emerald-600">
                        🌿 Naturaleza
                    </h3>
                    <p class="text-sm text-gray-600">
                        Cascadas, lagunas y reservas naturales.
                    </p>
                </div>

                <div>
                    <h3 class="font-semibold text-lg text-emerald-600">
                        🏞 Turismo cultural
                    </h3>
                    <p class="text-sm text-gray-600">
                        Zonas arqueológicas y comunidades vivas.
                    </p>
                </div>

                <div>
                    <h3 class="font-semibold text-lg text-emerald-600">
                        🏨 Servicios
                    </h3>
                    <p class="text-sm text-gray-600">
                        Hoteles, restaurantes y guías locales.
                    </p>
                </div>

                <div>
                    <h3 class="font-semibold text-lg text-emerald-600">
                        🧭 Aventura
                    </h3>
                    <p class="text-sm text-gray-600">
                        Senderismo, ecoturismo y exploración.
                    </p>
                </div>
            </div>
        </div>

        <div>
            <img src="{{ asset('img/S1.jpg') }}"
                 class="rounded-3xl shadow-xl"
                 alt="Cultura de Ocosingo">
        </div>

    </div>
</section>

<!-- SECCIÓN SERVICIOS TURÍSTICOS -->
<section class="py-24 max-w-7xl mx-auto px-6">
    <h2 class="text-4xl font-bold text-center mb-12 text-gray-800">
        Servicios en Ocosingo
    </h2>

    <div class="grid md:grid-cols-3 gap-8">
        @foreach ([
            ['icon'=>'icons/hotel.png','title'=>'Hoteles','text'=>'Hospedaje cómodo y seguro.', 'route'=>'servicios.hoteles'],//Conexión con lista de hoteles
            ['icon'=>'icons/cloche.png','title'=>'Restaurantes','text'=>'Gastronomía local y regional.', 'route'=>'servicios.restaurantes'], //Conexión con lista de restaurantes
            ['icon'=>'icons/taxi.png','title'=>'Taxi Local','text'=>'Guías para llegar a tu destino.', 'route'=>'ecoturisticos.index']//Conexión con vista ecoturisticos
        ] as $card)
            <div class="bg-white rounded-2xl shadow-lg p-8 text-center hover:scale-105 transition">
                <img src="{{ asset('img/'.$card['icon']) }}"
                    class="mx-auto mb-4 h-14 w-auto"
                    alt="{{ $card['title'] }}">

                <h3 class="text-2xl font-semibold text-emerald-600 mb-4">
                    {{ $card['title'] }}
                </h3>
                <p class="text-gray-600 mb-6">
                    {{ $card['text'] }}
                </p>

                <a href="{{ route($card['route']) }}"
                    class="bg-emerald-600 text-white px-6 py-2 rounded-full font-semibold hover:bg-emerald-700 transition inline-block">
                    Ver más
                </a>

            </div>
        @endforeach
    </div>
</section>

@include('components.footer')

@endsection
