<div>
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12 text-gray-700">
        <h1 class="text-3xl text-center font-semibold mb-8">Asignar rol</h1>
        <div class="bg-white shadow-xl rounded-lg p-4">
            <div class="grid grid-cols-1 gap-2 mb-4">

                {{-- Nombre --}}
                <div class="mb-4">
                    <x-jet-label value="Nombre" />
                    <x-jet-input type="text" wire:model="readForm.name" step=".01" class="w-full" readonly />
                    <x-jet-input-error for="readForm.name" />
                </div>

                <h2 class="h5">Listado de roles</h2>

                {{--{!! Form::model($user, ['route' => ['superadmin.users.edit', $user], 'method' => 'put']) !!}
                    @foreach ($roles as $role)
                        <div>
                            <label>
                                {!! Form::checkbox('roles[]', $role->id, null, ['class' => 'mr-1']) !!}
                                {{$role->name}}
                            </label>
                        </div>
                    @endforeach

                    {!! Form::submit('Asignar rol', ['class' => 'btn btn-primary']) !!}
                {!! Form::close() !!}--}}

                <div class="mb-4">
                    @foreach ($roles as $role)
                    <div class="btn-group-toggle mb-4" data-toggle="buttons">
                        <label class="btn btn-primary"><input wire:model="editForm.role_id" class="mr-2" type="checkbox" value="{{$role->id}}">{{$role->name}}</label><br>
                    </div>
                    @endforeach
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
</div>
