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
        <div class="h max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
            <h1 class="text-3xl text-center text-gray-700 font-semibold mb-8">VEREDA</h1>
            <p class="text-center">Complete esta información para agregar una vereda</p>
        </div>
        <div class="bg-white shadow-xl rounded-lg p-4">
            <div class="grid grid-cols-1 gap-2 mb-4">
                {{-- Departamento --}}
                <div class="mb-4">
                    <x-jet-label value="Departamento" />
                    <select class="form-control w-full rounded-lg p-2" name="departments"
                        wire:model="createForm.department_id">
                        <option value="" disabled selected>Seleccione un Departamento</option>
                        @foreach ($departments as $department)
                            <option value="{{ $department->id }}">{{ $department->name }}</option>
                        @endforeach
                    </select>
                    <x-jet-input-error for="createForm.department_id" />
                </div>

                {{-- Municipio --}}
                <div class="mb-4">
                    <x-jet-label value="Municipio" />
                    <select class="form-control w-full rounded-lg p-2" name="municipalies"
                        wire:model="createForm.municipality_id">
                        <option value="" disabled selected>Seleccione un Municipio</option>
                        @foreach ($municipalies as $municipalie)
                            <option value="{{ $municipalie->id }}">{{ $municipalie->name }}</option>
                        @endforeach
                    </select>
                    <x-jet-input-error for="createForm.municipality_id" />
                </div>

                {{-- Nombre --}}
                <div class="mb-4">
                    <x-jet-label value="Nombre" />
                    <x-jet-input type="text" wire:model="createForm.name" class="w-full" />
                    <x-jet-input-error for="createForm.name" />
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
