<div>
    <x-slot name="header">
        <div class="flex items-center">
            <h2 class="font-semibold text-cl text-gray-600 leading-tight">Banner</h2>
            {{--<x-button-enlace class="bg-yellow-500 ml-auto" href="{{ route('admin.banner.create') }}">
                Agregar
            </x-button-enlace>--}}
        </div>
    </x-slot>
   

    <div class="container pt-12 pb-40 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8;">

        {{--<div class="px-6 py-4 ">
            <x-jet-input wire:model="search" type="text"
                placeholder="Ingrese el estado del banner que quiere buscar" class="w-full" />
        </div>--}}

        <!-- This example requires Tailwind CSS v2.0+ -->
        <x-tableresponsive>
            @if ($banners->count())
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Foto
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Estado
                            </th>
                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">Editar</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($banners as $banner)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">
                                        <img class="img-thumbnail img-fluid" src="{{ asset($banner->url_photo) }}" width="250" alt="">
                                            {{--src="{{Storage::url($document->url_photo)}}"--}}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">
                                        @if ($banner->status == '0')
                                            {{'Inactivo'}}
                                        @else
                                            @if ($banner->status == '1')
                                                {{'Activo'}}
                                            @endif
                                        @endif
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="{{ route('admin.banner.edit', $banner->id) }}" class="text-indigo-600 hover:text-indigo-900">
                                        <svg class="h-8 w-8 text-green-500"  viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  
                                            <path stroke="none" d="M0 0h24v24H0z"/>  <path d="M9 7 h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" />  <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" />  <line x1="16" y1="5" x2="19" y2="8" />
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        <!-- More people... -->
                    </tbody>
                </table>
            @else
                <div class="px-6 py-4">
                    No hay ningun registro coincidente
                </div>
            @endif


            @if ($banners->hasPages())
                <div class="px-6 py-4">
                    {{ $banners->links() }}
                </div>
            @endif

        </x-tableresponsive>

    </div>
</div>
