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
            <h1 class="text-3xl text-center text-gray-700 font-semibold mb-8">FORMATO</h1>
            <p class="text-center">Complete esta información para agregar un formato</p>
        </div>
        <div class="bg-white shadow-xl rounded-lg p-4">
            <div class="grid grid-cols-1 gap-2 mb-4">

                {{-- Archivo --}}
                <div class="mb-4">
                    <x-jet-label value="Archivo" />
                    <x-jet-input type="file" wire:model="createForm.url" class="form-control w-full rounded-lg p-2" />
                    <x-jet-input-error for="createForm.url" />
                </div>

                {{-- Módulo --}}
                <div class="mb-4">
                    <x-jet-label value="Módulo" />
                    <select class="form-control w-full rounded-lg p-2" name="modules"
                        wire:model="createForm.module_id">
                        <option value="" disabled selected>Seleccione un módulo</option>
                        @foreach ($modules as $module)
                            <option value="{{ $module->id }}">{{ $module->name }}</option>
                        @endforeach
                    </select>
                    <x-jet-input-error for="createForm.module_id" />
                </div>
            </div>
            <div class="flex mt-4 justify-end items-center">
                <x-jet-button wire:loading.attr="disabled" wire:target="save" class="" wire:click="save">
                    Agregar
                </x-jet-button>
            </div>
        </div>
    </div>
</div>
