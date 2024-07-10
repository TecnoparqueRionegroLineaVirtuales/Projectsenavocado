<div>
    <style>
        .h h1::after{
            content: '';
            position: absolute;
            display: block;
            width: 50px;
            height: 3px;
            background: #3AA901;
            margin-top: 16px;
            left: calc(50% - 25px);
        }
    </style>
    
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-12 text-gray-700">
        <div class="h max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <h1 class="text-3xl text-center text-gray-700 font-semibold mb-8">AUTOR</h1>
            <p class="text-center">Complete esta información para editar un autor</p>
        </div>
        <div class="bg-white shadow-xl rounded-lg p-4">
            <div class="grid grid-cols-1 gap-2 mb-4">

                {{-- Nombre --}}
                <div class="mb-4">
                    <x-jet-label value="Nombre" />
                    <x-jet-input type="text" wire:model="editForm.name" step=".01" class="w-full" />
                    <x-jet-input-error for="editForm.name" />
                </div>

                {{-- Apellido --}}
                <div class="mb-4">
                    <x-jet-label value="Apellido" />
                    <x-jet-input type="text" wire:model="editForm.lastname" class="w-full" />
                    <x-jet-input-error for="editForm.lastname" />
                </div>
            </div>
            <div class="flex mt-4 justify-end items-center">

                <x-jet-action-message class="mr-3 text-red-400 font-bold" on="updated">
                    Actualizando
                </x-jet-action-message>

                <x-jet-button wire:loading.attr="disabled" wire:target="update" class=""
                    wire:click="update">
                    Actualizar
                </x-jet-button>
            </div>
        </div>
    </div>
</div>
