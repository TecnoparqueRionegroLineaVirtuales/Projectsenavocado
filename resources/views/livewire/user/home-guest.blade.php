<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    {{--<title>{{ config('app.name', 'Laravel') }}</title>--}}
    <title>Senavocado</title>
    <link href="/img/logo.png" rel="icon">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link href="https://unpkg.com/tailwindcss@^2.0/dist/tailwind.min.css" rel="stylesheet">
    {{-- dropzone --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/dropzone.min.css"
        integrity="sha512-jU/7UFiaW5UBGODEopEqnbIAHOI8fO6T99m7Tsmqs2gkdujByJfkCbbfPSN4Wlqlb9TGnsuC0YgUgWkRBK7B9A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- sweetalert2 --}}
    {{-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}

    {{-- font-awesome --}}
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
        integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}

    @livewireStyles

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
    {{-- ckedito --}}
    <script src="https://cdn.ckeditor.com/ckeditor5/31.0.0/classic/ckeditor.js"></script>
    {{-- dropzone --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.js"
        integrity="sha512-VQQXLthlZQO00P+uEu4mJ4G4OAgqTtKG1hri56kQY1DtdLeIqhKUp9W/lllDDu3uN3SnUNawpW7lBda8+dSi7w=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body>
    @livewire('navigation-guest-menu')
    <div>
        <div>
            {{--Carrusel para el banner--}}
            @if ($banners->count())
            <div id="controls-carousel" class="relative" data-carousel="static">
                <div class="overflow-hidden relative h-56 rounded-lg sm:h-64 xl:h-80 2xl:h-96">
                        @foreach ($banners as $banner)
                            @if($banner->status == '1')
                            <div class="duration-700 ease-in-out absolute inset-0 transition-all transform translate-x-0 z-20 banner flex items-center justify-center h-full" data-carousel-item="active">
                                    <img class="h-full" src="{{ asset($banner->url_photo) }}" alt="...">
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            @else
                <div class="px-6 py-4">
                    No hay registros
                </div>
            @endif
        
            {{--Sección de herramientas--}}

            @if ($videos->count())
                <div class="h mt-20 container w-5/6 mx-auto pb-30">
                    <h1 class="herramientas text-3xl text-center text-gray-800 font-semibold mb-8">Senavocado</h1>
                    <div class="relative flex h-auto justify-center flex-wrap">
                        @foreach ($videos as $video)
                            @if ($video->status == '1')
                                <iframe width="560" height="315" src="{{asset($video->url)}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            @endif
                        @endforeach    
                    </div>
                </div>
                <!--https://www.youtube.com/embed/v6aZKdjjbZs-->
                <!--https://www.youtube.com/embed/juAK07SB0PI-->
            @else
                <div class="px-6 py-4">
                    No hay registros
                </div>
            @endif

            <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
                <h1 class="herramientas text-3xl text-center text-gray-800 font-semibold mb-8">Herramientas</h1>
                <p class="text-center">En esta sección encontrarás diferentes herramientas gratuitas que te apoyarán en la optimización, mejoramiento de tus cultivos.</p>
            </div>
        
            @if ($modules->count())
                <div class="container w-5/6 mx-auto pb-40">
                    <div class="relative flex h-auto justify-center flex-wrap">
                        @foreach ($modules as $module)
                            <div class="px-4 py-2 m-2 w-64 servicio icon-box">

                                @if ($module->id == 2 || $module->id == 3)
                                    <div class="icon">
                                        <a href="{{ route('register') }}"><img src="{{ asset($module->url_photo) }}"></a>
                                    </div>
                                    <h4 class="title text-gray-700 uppercase"><a href="{{ route('register') }}">{{ $module->name }}</a></h4>
                                    <p class="description">{{ $module->description }}</p>
                                @else

                                    @if($module->route != null)
                                        <div class="icon">
                                            <a href="{{ route($module->route, $module->format_id) }}"><img src="{{ asset($module->url_photo) }}"></a>
                                        </div>
                                        <h4 class="title text-gray-700 uppercase"><a href="{{ route($module->route, $module->format_id) }}">{{ $module->name }}</a></h4>
                                        <p class="description">{{ $module->description }}</p>
                                    @else
                                        <div class="icon">
                                            <a href="{{ $module->url }}" target="blank"><img src="{{ asset($module->url_photo) }}"></a>
                                        </div>
                                        <h4 class="title text-gray-700 uppercase"><a href="{{ $module->url }}" target="blank">{{ $module->name }}</a></h4>
                                        <p class="description">{{ $module->description }}</p>
                                    @endif
                                    
                                @endif

                            </div>
                        @endforeach
                    </div>
                </div>
            @else
                <div class="px-6 py-4">
                    No hay registros
                </div>
            @endif
        </div>
    </div>
    @livewire('footer')
</body>
</html>
