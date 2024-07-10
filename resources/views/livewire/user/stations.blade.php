<div>
    <div class="h max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <h1 class="text-3xl text-center text-gray-700 font-semibold mb-8">ESTACIONES INSTALADAS</h1>
    </div>

    @if ($stations->count())
        <div class="container w-5/6 mx-auto pb-40">
            <div class="relative flex h-auto justify-center flex-wrap">
                @foreach ($stations as $station)
                    @if($station->status == '1')
                        <div class="absolute  m-2 w-64 estacion rounded-lg">
                            <div class="icon">
                                <a href="{{ route('frontend.user.indicator') }}"><img class=" w-40 h-24" src="{{ asset('/img/iconos/Climatica-Color.svg') }}"></a>
                            </div>
                            <h5 class="name">{{ $station->name }}</h5>
                            {{ $station->name_municipality }} {{ $station->department }}
                            <div class="descripcion rounded-b-lg">
                                descripción
                            </div>
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

    <style>
        .h h1::after{
            content: '';
            position: absolute;
            display: block;
            width: 50px;
            height: 3px;
            background: #e96b56;
            margin-top: 16px;
            left: calc(50% - 25px);
        }

        .estacion{
            height: 230px;
            width: 350px;
            box-shadow: 0px 2px 15px rgb(0 0 0 / 15%);
            padding: 50px 0px;
            margin-top: 35px;
            margin-bottom: 25px;
            text-align: center;
            position: relative;
            background: #fff;
        }

        .name{
            font-size: 20px;
            font-family: Raleway,sans-serif;
            color: #e96b56;
            margin-top: 10px;
        }

        .icon{
            margin-top: -45px;
            transition: 0.2s;
            background: #ffffff;
            padding-left: 60px;
        }

        .icon img{
            width: 200px;
            height: 100px;
        }

        .relative .descripcion{
            width: 350px;
            margin-top: 21px;
            height: 45px;
            position: absolute;
            background:#d2d2d2;
            text-align: center;
            padding-top: 7px;
        }
    </style>
</div>
