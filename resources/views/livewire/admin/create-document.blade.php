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

    
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-3 text-gray-700">
        <div class="h max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
            <h1 class="text-3xl text-center text-gray-700 font-semibold mb-8">DOCUMENTO</h1>
            <p class="text-center">Complete esta información para agregar un documento</p>
        </div>
        <div class="bg-white shadow-xl rounded-lg p-4">
            <div class="grid grid-cols-2 gap-2 mb-4">

                {{-- Título --}}
                <div class="mb-4">
                    <x-jet-label value="Título" />
                    <x-jet-input type="text" wire:model="createForm.title" class="w-full" />
                    <x-jet-input-error for="createForm.title" />
                </div>

                {{-- Descripción --}}
                <div class="mb-4">
                    <x-jet-label value="Descripción" />
                    <textarea type="text" wire:model="createForm.description" step=".01" class="form-control w-full rounded-lg p-2"></textarea>
                    <x-jet-input-error for="createForm.description" />
                </div>

                {{-- Fecha de publicación --}}
                <div class="mb-4">
                    <x-jet-label value="Fecha de publicación" />
                    <x-jet-input type="date" wire:model="createForm.date_publication" class="w-full" />
                    <x-jet-input-error for="createForm.date_publication" />
                </div>

                {{-- Autor --}}
                <div class="mb-4">
                    <x-jet-label value="Autor" />
                    <select class="form-control w-5/6 rounded-lg p-2" name="author"
                        wire:model="createForm.author_id">
                        <option value="" disabled selected>Seleccione un autor</option>
                        @foreach ($authors as $author)
                            <option value="{{ $author->id }}">{{ $author->name }} {{ $author->lastname }}</option>
                        @endforeach
                    </select>
                    <x-jet-input-error for="createForm.author_id" />

                    <x-jet-button class="text-base" wire:click="add()">
                        +
                    </x-jet-button>
                </div>

                {{--Foto--}}
                <div class="mb-4">
                    <x-jet-label value="Foto" />
                    <x-jet-input type="file" wire:model="createForm.url_photo" step=".01" class="form-control w-full rounded-lg p-2" />
                    <x-jet-input-error for="createForm.url_photo" />
                </div>

                {{-- Archivo --}}
                <div class="mb-4">
                    <x-jet-label value="Archivo" />
                    <x-jet-input type="file" wire:model="createForm.url_file" class="form-control w-full rounded-lg p-2" />
                    <x-jet-input-error for="createForm.url_file" />
                </div>

                {{--Estado--}}
                <div class="mb-4">
                    <x-jet-label value="Estado" />
                    <select class="form-control w-full rounded-lg p-2" name="Estado"
                        wire:model="createForm.status">
                        <option value="" disabled selected>Seleccione un estado</option>
                        <option value="0">Borrador</option>
                        <option value="1">Publicar</option>
                    </select>
                    <x-jet-input-error for="createForm.status" />
                </div>
            </div>
            <div class="flex mt-4 justify-end items-center">
                <x-jet-button wire:loading.attr="disabled" wire:target="save" class="" wire:click="save">
                    Agregar
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
