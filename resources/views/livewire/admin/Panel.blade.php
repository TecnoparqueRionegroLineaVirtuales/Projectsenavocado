<div>
    <x-slot name="header">
        <div class="flex items-center">
            <h2 class="font-semibold text-cl text-gray-600 leading-tight">Lista de Estaciones</h2>
            <x-button-enlace class="bg-green-500 hover:bg-green-500 ml-auto" href="{{ route('admin.station.create') }}">
                Agregar
            </x-button-enlace>
            <x-button-enlace class="bg-green-500 hover:bg-green-500 ml-auto" href="{{ route('admin.panel') }}">
                Agregar panel
            </x-button-enlace>
        </div>
    </x-slot>

    <div class="container py-12 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8;">

        <div class="px-6 py-4 ">
            <x-jet-input wire:model="search" type="text"
                placeholder="Ingrese el nombre de la estación que quiere buscar" class="w-full" />
        </div>
        <div>
            
        </div>
    

    </div>
</div>
