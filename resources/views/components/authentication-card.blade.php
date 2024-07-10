<style>

    .fondo{
        position: relative;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: url("../img/FondoInicioSesion2.png");
        background-size: 1360px;
        background-position: center;
        mix-blend-mode: screen;
        background-repeat: no-repeat;
        /*background-color: rgb(226, 226, 226);*/
    }
</style>
<div class="fondo min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
    <div>
        {{ $logo }}
    </div>

    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        {{ $slot }}
    </div>
</div>