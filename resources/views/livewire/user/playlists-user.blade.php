<div>
    <style>
        .card{
            box-shadow: 0px 3px 10px rgb(0 0 0 / 20%);
        }
    </style>
    @if ($playlists->count())
        <div class="container w-full mx-auto pt-20 pb-40">
            <div class="relative flex h-auto justify-center flex-wrap">
                @foreach ($playlists as $playlist)
                    @if ($playlist->status == '1')
                        <div class=" card m-2 max-w-xs bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                            <a href="#">
                                <img class="rounded-t-lg" src="{{ asset($playlist->url_photo) }}" alt="">
                            </a>
                            <div class="p-5">
                                <a href="#">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $playlist->title }}</h5>
                                </a>
                                <p class="mb-3 font-normal text-left text-gray-700 dark:text-gray-400">{{ $playlist->description }}</p>
                                <a href="{{ $playlist->url_playlist }}" target="blank" class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    Ver playlist
                                    <svg aria-hidden="true" class="ml-2 -mr-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                </a>
                                
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
</div>
