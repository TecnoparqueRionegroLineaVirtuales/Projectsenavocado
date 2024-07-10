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

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-6 text-gray-700">
        <div class="h max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
            <h1 class="text-3xl text-center text-gray-700 font-semibold mb-8">ESTACIÓN</h1>
            <p class="text-center">Complete esta información para editar una estación</p>
        </div>
        <div class="bg-white shadow-xl rounded-lg p-4">
            <div class="grid grid-cols-2 gap-2 mb-4">

                {{-- Departamento --}}
                <div class="mb-4">
                    <x-jet-label value="Departamento" />
                    <select class="form-control w-full rounded-lg p-2" name="departments"
                        wire:model="editForm.department_id">
                        <option value="" disabled selected>Seleccione un Departamento</option>
                        @foreach ($departments as $department)
                            <option value="{{ $department->id }}">{{ $department->name }}</option>
                        @endforeach
                    </select>
                    <x-jet-input-error for="editForm.department_id" />
                </div>

                {{-- Municipio --}}
                <div class="mb-4">
                    <x-jet-label value="Municipio" />
                    <select class="form-control w-full rounded-lg p-2" name="municipalies"
                        wire:model="editForm.municipality_id">
                        <option value="" disabled selected>Seleccione un Municipio</option>
                        @foreach ($municipalies as $municipalie)
                            <option value="{{ $municipalie->id }}">{{ $municipalie->name }}</option>
                        @endforeach
                    </select>
                    <x-jet-input-error for="editForm.municipality_id" />
                </div>

                {{-- Vereda --}}
                <div class="mb-4">
                    <x-jet-label value="Vereda" />
                    <select class="form-control w-full rounded-lg p-2" name="vereda"
                        wire:model="editForm.vereda_id">
                        <option value="" disabled selected>Seleccione una vereda</option>
                        @foreach ($veredas as $vereda)
                            <option value="{{ $vereda->id }}">{{ $vereda->name }}</option>
                        @endforeach
                    </select>
                    <x-jet-input-error for="editForm.vereda_id" />
                </div>

                {{-- Código --}}
                <div class="mb-4">
                    <x-jet-label value="Código" />
                    <x-jet-input type="text" wire:model="editForm.code" step=".01" class="w-full" />
                    <x-jet-input-error for="editForm.code" />
                </div>

                {{-- Nombre --}}
                <div class="mb-4">
                    <x-jet-label value="Nombre" />
                    <x-jet-input type="text" wire:model="editForm.name" class="w-full" />
                    <x-jet-input-error for="editForm.name" />
                </div>

                {{-- Latitud --}}
                <div class="mb-4">
                    <x-jet-label value="Latitud" />
                    <x-jet-input type="text" wire:model="editForm.latitude" class="w-full" />
                    <x-jet-input-error for="editForm.latitude" />
                </div>

                {{-- Longitud --}}
                <div class="mb-4">
                    <x-jet-label value="Longitud" />
                    <x-jet-input type="text" wire:model="editForm.longitude" class="w-full" />
                    <x-jet-input-error for="editForm.longitude" />
                </div>

                {{--Estado--}}
                <div class="mb-4">
                    <x-jet-label value="Estado" />
                    <select class="form-control w-full rounded-lg p-2" name="Estado"
                        wire:model="editForm.status">
                        <option value="" disabled selected>Seleccione un estado</option>
                        <option value="0">Inactivo</option>
                        <option value="1">Activo</option>
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
</div>
