<div>
    <x-slot name="header">
        <div class="flex items-center">
            <h2 class="font-semibold text-cl text-gray-600 leading-tight">Lista de Usuarios</h2>
            {{--<x-button-enlace class="bg-yellow-500 ml-auto" href="#">
                Agregar
            </x-button-enlace>--}}
        </div>
    </x-slot>

    <div class="container py-12 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8;">

        <div class="px-6 py-4 ">
            <x-jet-input wire:model="search" type="text"
                placeholder="Ingrese el nombre del usuario que quiere buscar" class="w-full" />
        </div>

        <!-- This example requires Tailwind CSS v2.0+ -->
        <x-tableresponsive>
            @if (count($users))
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Nombre
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Email
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Rol
                            </th>
                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">Editar</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($users as $user)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">
                                        {{ $user->name }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">
                                        {{ $user->email }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">
                                        @if (count($user->roles))
                                            Administrador
                                        @else
                                            No Tiene Rol
                                        @endif
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    {{--<a href="{{ route('superadmin.users.edit', $user->id) }}" class="text-indigo-600 hover:text-indigo-900">
                                        <svg class="h-8 w-8 text-yellow-500"  viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  
                                            <path stroke="none" d="M0 0h24v24H0z"/>  <path d="M9 7 h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" />  <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" />  <line x1="16" y1="5" x2="19" y2="8" />
                                        </svg>
                                    </a>--}}
                                    <label>
                                        {{-- con "event.target.value", le estamos pasando como segundo parametro el valor de la propiedad "value",
                                        ya que el primer parametro es el "id" del usuario, a la función "assignRole". --}}
                                        <input {{ count($user->roles) ? 'checked' : '' }} value="1" type="radio"
                                            name="{{ $user->email }}"
                                            wire:change="assignRole({{ $user }}, $event.target.value)" />
                                        Si
                                    </label>
                                    <label>
                                        <input {{ count($user->roles) ? '' : 'checked' }} value="0" type="radio"
                                            name="{{ $user->email }}"
                                            wire:change="assignRole({{ $user }}, $event.target.value)" />
                                        No
                                    </label>
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


            @if ($users->hasPages())
                <div class="px-6 py-4">
                    {{ $users->links() }}
                </div>
            @endif

        </x-tableresponsive>

    </div>
</div>
