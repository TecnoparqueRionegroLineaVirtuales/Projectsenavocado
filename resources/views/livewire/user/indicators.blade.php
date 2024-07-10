<div>
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
            padding-left: 75px;
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

    <div class="h max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <h1 class="text-3xl text-center text-gray-700 font-semibold mb-8">ESTACIÓN METEOROLÓGICA</h1>
        <P class="text-center">Ubicación</P>
    </div>
    {{--<div>
       <iframe src="" width="1750" height="1300" frameborder="0"></iframe>
    </div>--}}

    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card">
                <div class="card-body">

                    <div class="row mt-3">
                        <div class="col-12 d-flex justify-content-center">
                            <iframe
                                src="http://194.163.44.55:3000/d/80mV7HV4z/temperatura?orgId=1&from=1663778010000&to=1663778014000&kiosk=tv"
                                width="1345" height="1700" frameborder="0"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

   {{-- @if ($indicators->count())
        <div class="container w-5/6 mx-auto pb-40">
            <div class="relative flex h-auto justify-center flex-wrap">
                @foreach ($indicators as $indicator)
                    <div class="absolute  m-2 w-64 estacion rounded-lg">
                        <div class="icon">
                            <a href="#"><img class="w-40 h-24" src="{{ asset('/img/iconos/termometro.svg') }}"></a>
                        </div>
                        <h5 class="name">{{ $indicator->name }}</h5>
                        <p>25 °C</p>
                        <div class="descripcion rounded-b-lg">
                            descripción
                        </div>
                    </div>
                    @endforeach
            </div>
        </div>
    @else
        <div class="px-6 py-4">
            No hay registros
        </div>
    @endif--}}
</div>
