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

    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-12 text-gray-700">
        <div class="h max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
            <h1 class="text-3xl text-center text-gray-700 font-semibold mb-8">VIDEO</h1>
            <p class="text-center">Complete esta información para editar un video</p>
        </div>
        <div class="bg-white shadow-xl rounded-lg p-4">
            <div class="grid grid-cols-1 gap-2 mb-4">

                {{-- url --}}
                <div class="mb-4">
                    <x-jet-label value="url" />
                    <x-jet-input type="text" wire:model="editForm.url" step=".01" class="w-full" />
                    <x-jet-input-error for="editForm.url" />
                </div>

                {{-- Fecha --}}
                <div class="mb-4">
                    <x-jet-label value="Fecha" />
                    <x-jet-input type="date" wire:model="editForm.date" class="w-full" />
                    <x-jet-input-error for="editForm.date" />
                </div>

                {{--Estado--}}
                {{--<div class="mb-4">
                    <x-jet-label value="Estado" />
                    <select class="form-control w-full rounded-lg p-2" name="Estado"
                        wire:model="editForm.status">
                        <option value="" disabled selected>Seleccione un estado</option>
                        <option value="1">Activo</option>
                        <option value="2">Inactivo</option>
                    </select>
                    <x-jet-input-error for="editForm.status" />
                </div>--}}
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
