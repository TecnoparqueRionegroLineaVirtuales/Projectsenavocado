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

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12 text-gray-700">
        <div class="h max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
            <h1 class="text-3xl text-center text-gray-700 font-semibold mb-8">PLAYLIST</h1>
            <p class="text-center">Complete esta información para editar una playlist</p>
        </div>
        <div class="bg-white shadow-xl rounded-lg p-4">
            <div class="grid grid-cols-2 gap-2 mb-4">

                {{-- Título --}}
                <div class="mb-4">
                    <x-jet-label value="Título" />
                    <x-jet-input type="text" wire:model="editForm.title" step=".01" class="w-full" />
                    <x-jet-input-error for="editForm.title" />
                </div>

                {{-- Url playlist --}}
                <div class="mb-4">
                    <x-jet-label value="Url playlist" />
                    <x-jet-input type="text" wire:model="editForm.url_playlist" class="w-full" />
                    <x-jet-input-error for="editForm.url_playlist" />
                </div>

                {{-- Descripción --}}
                <div class="mb-4">
                    <x-jet-label value="Descripción" />
                    <x-jet-input type="text" wire:model="editForm.description" class="w-full" />
                    <x-jet-input-error for="editForm.description" />
                </div>

                {{-- Foto --}}
                {{--<div class="mb-4">
                    <x-jet-label value="Foto" />
                    <x-jet-input type="file" wire:model="editForm.url_photo" class="w-full" />
                    <x-jet-input-error for="editForm.url_photo" />
                </div>--}}
                
                {{--Estado--}}
                <div class="mb-4">
                    <x-jet-label value="Estado" />
                    <select class="form-control w-full rounded-lg p-2" name="Estado"
                        wire:model="editForm.status">
                        <option value="" disabled selected>Seleccione un estado</option>
                        <option value="0">Borrador</option>
                        <option value="1">Publicar</option>
                        <option value="2">Deshabilitar</option>
                    </select>
                    <x-jet-input-error for="editForm.status" />
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

    {{-- Modal agregar autor --}}
    <x-jet-dialog-modal wire:model="createAuthor.open"> {{-- este modal lo sincronizamos con la propiedad "createAuthor", y su elemento "open". --}}
        <x-slot name="title">
            Agregar autor
        </x-slot>
        <x-slot name="content">
            <div class="space-y-3">
                <div>
                    <x-jet-label>
                        Nombre
                    </x-jet-label>
                    <x-jet-input wire:model="createAuthor.name" type="text" class="w-full mt-1" />

                    <x-jet-input-error for="createAuthor.name" />
                </div>
                <div>
                    <x-jet-label>
                        Apellido
                    </x-jet-label>
                    <x-jet-input wire:model="createAuthor.lastname" type="text" class="w-full mt-1" />

                    <x-jet-input-error for="createAuthor.lastname" />
                </div>
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-danger-button wire:click="saveAuthor" wire:loading.attr="disabled" wire:target="saveAuthor">
                Agregar
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
