<div>
    {{--Footer--}}
    <footer class="mt-20 bg-gray-800">
        <div class="grid grid-cols-2 gap-8 py-8 px-6 md:grid-cols-4">
            <div>
                <h2 class="mb-6 text-sm font-semibold text-gray-400 uppercase">LINKS</h2>
                <ul class="text-gray-300">
                    <li class="mb-4">
                        <a href="{{ route('frontend.user.index') }}" class=" hover:underline">Inicio</a>
                    </li>
                    <li class="mb-4">
                        <a href="{{ route('frontend.user.calculator') }}" class="hover:underline">Herramientas</a>
                    </li>
                    <li class="mb-4">
                        <a href="https://www.youtube.com/channel/UCrHtg4UEofVeQV5loAVx8cg/featured" target="_blank" class="hover:underline">Videos</a>
                    </li>
                </ul>
            </div>
            <div>
                <h2 class="mb-6 text-sm font-semibold text-gray-400 uppercase">HERRAMIENTAS DE INTERES</h2>
                <ul class="text-gray-300">
                    <li class="mb-4">
                        <a href="{{ route('frontend.user.calculator') }}" class="hover:underline">Calculadora de fertilización</a>
                    </li>
                    @if (Route::has('login'))
                        @auth
                            <li class="mb-4">
                                <a href="{{ route('frontend.user.station') }}" class="hover:underline">Estaciones meteorológicas</a>
                            </li>
                        @endauth
                    @endif
                    
                    <li class="mb-4">
                        <a href="{{ route('frontend.user.document') }}" class="hover:underline">Documentos</a>
                    </li>
                </ul>
            </div>
            <div>
                <h2 class="mb-6 text-sm font-semibold text-gray-400 uppercase">CONTACTO</h2>
                <ul class="text-gray-300">
                    <p>
                        5760000 <br> Rionegro Antioquia,<br> Colombia <br><br>

                        <strong>Email:</strong> contacto@senavocado.com<br>
                    </p>
                </ul>
            </div>
            <div>
                <h2 class="mb-6 text-sm font-semibold text-gray-400 uppercase">Nuestras redes sociales</h2>
                <ul class="text-gray-300">
                    <p>
                        Visita nuestras redes sociales y síguenos para estar siempre al día de nuestras actividades.
                    </p>
                    <div class="mt-5">
                        <a href="https://www.youtube.com/channel/UCrHtg4UEofVeQV5loAVx8cg/featured">
                            <svg class="h-8 w-8 text-gray-300"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  
                                <path d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 0 0-1.94 2A29 29 0 0 0 1 11.75a29 29 0 0 0 .46 5.33A2.78 2.78 0 0 0 3.4 19c1.72.46 8.6.46 8.6.46s6.88 0 8.6-.46a2.78 2.78 0 0 0 1.94-2 29 29 0 0 0 .46-5.25 29 29 0 0 0-.46-5.33z" />  
                                <polygon points="9.75 15.02 15.5 11.75 9.75 8.48 9.75 15.02" />
                            </svg>
                        </a>
                        {{--<a href="#">
                            <svg class="h-8 w-8 text-gray-300"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  
                                <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z" />
                            </svg>
                        </a>--}}
                    </div>
                </ul>
            </div>
        </div>
        
        <span class="block py-6 text-sm bg-gray-700 text-gray-300 sm:text-center dark:text-gray-400">Diseñado por Tecnoparque <a href="https://gestionredtecnoparquecolombia.com.co/inicio/nodo-rionegro/" class="hover:underline">Nodo Rionegro</a></span>
    </footer>
</div>
