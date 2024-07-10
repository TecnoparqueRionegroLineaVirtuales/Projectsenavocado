<div>
    <style>
        .h h1::after{
            content: '';
            position: absolute;
            display: block;
            width: 50px;
            height: 3px;
            background: #70B22D;
            margin-top: 16px;
            left: calc(50% - 25px);
        }
    </style>

    {{--Carrusel para el banner--}}
    <div id="controls-carousel" class="relative" data-carousel="static">
        <div class="overflow-hidden relative h-56 rounded-lg sm:h-64 xl:h-80 2xl:h-96">
            <div class="duration-700 ease-in-out absolute inset-0 transition-all transform translate-x-0 z-20" data-carousel-item="active">
                <img  class="w-full h-full" src="{{ asset('/img/Banner_Administrativo.svg') }}" class="block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2" alt="...">
            </div>
        </div>
    </div>

    {{--Sección de herramientas--}}
    @can('admin.banners.index')
        <div class="h max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
            <h1 class="herramientas text-3xl text-center text-gray-800 font-semibold mb-8">Panel administrativo</h1>
            <p class="text-center">En este panel encontrarás el panel de configuración, donde podrás administrar la información de senavocado.</p>
        </div>
    @endcan

    @can('superadmin.users.index')
    <div class="h max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
        <h1 class="herramientas text-3xl text-center text-gray-800 font-semibold mb-8">Panel administrativo</h1>
        <p class="text-center">En este panel encontrarás la lista de usuarios, donde podrás promover a un usuario a rol administrador y a si mismo restringir este rol.</p>
    </div>
    @endcan
    
</div>
