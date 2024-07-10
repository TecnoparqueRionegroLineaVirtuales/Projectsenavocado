<div>
    <x-slot name="header">
        <div class="flex items-center">
            <h2 class="font-semibold text-cl text-gray-600 leading-tight">Módulos</h2>
            {{--<x-button-enlace class="bg-yellow-500 ml-auto" href="{{ route('admin.module.create') }}">
                Agregar
            </x-button-enlace>--}}
        </div>
    </x-slot>

    <div class="container py-12 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8;">

        <div class="px-6 py-4 ">
            <x-jet-input wire:model="search" type="text"
                placeholder="Ingrese el nombre del módulo que quiere buscar" class="w-full" />
        </div>

        <!-- This example requires Tailwind CSS v2.0+ -->
        <x-tableresponsive>
            @if ($modules->count())
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Nombre
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Icono
                            </th>
                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">Editar</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($modules as $module)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">
                                        {{ $module->name }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">
                                        <img class="img-thumbnail img-fluid" src="{{ asset($module->url_photo) }}" width="50" alt="">
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="{{ route('admin.module.edit', $module->id) }}" class="text-indigo-600 hover:text-indigo-900">
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


            @if ($modules->hasPages())
                <div class="px-6 py-4">
                    {{ $modules->links() }}
                </div>
            @endif

        </x-tableresponsive>

    </div>
</div>
