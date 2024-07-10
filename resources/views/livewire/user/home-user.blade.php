<head>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<div>
    {{--Carrusel para el banner--}}
    @if ($banners->count())
        <div id="controls-carousel" class="relative" data-carousel="static">
            <div class="overflow-hidden relative h-56 rounded-lg sm:h-64 xl:h-80 2xl:h-96">
                @foreach ($banners as $banner)
                    @if($banner->status == '1')
                        <div class="duration-700 ease-in-out absolute inset-0 transition-all transform translate-x-0 z-20 banner flex items-center justify-center h-full" data-carousel-item="active">
                            <img class="h-full" src="{{ asset($banner->url_photo) }}" class="block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2" alt="...">
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

    <div class="h max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <h1 class="herramientas text-3xl text-center text-gray-800 font-semibold mb-8">Herramientas</h1>
        <p class="text-center">En esta sección encontrarás diferentes herramientas gratuitas que te apoyarán en la optimización, mejoramiento de tus cultivos.</p>
    </div>

    @if ($modules->count())
        <div class="container w-5/6 mx-auto pb-40">
            <div class="relative flex h-auto justify-center flex-wrap">
                @foreach ($modules as $module)
                    <div class="px-4 py-2 m-2 w-64 servicio icon-box">

                        @if($module->route != null)
                            <div class="icon">
                                <a href="{{ route($module->route, $module->format_id) }}"><img src="{{ asset($module->url_photo) }}"></a>
                            </div>
                            <h4 class="title text-gray-700 uppercase"><a href="{{ route($module->route, $module->format_id) }}">{{ $module->name }}</a></h4>
                            <p class="description">{{ $module->description }}</p>
                        @else
                            <div class="icon">
                                <a href="{{$module->url}}" target="blank"><img src="{{ asset($module->url_photo) }}"></a>
                            </div>
                            <h4 class="title text-gray-700 uppercase"><a href="{{$module->url}}" target="blank">{{ $module->name }}</a></h4>
                            <p class="description">{{ $module->description }}</p>
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
