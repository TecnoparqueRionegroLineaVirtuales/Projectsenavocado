<div>
    <style>
        .h h1::after{
            content: '';
            position: absolute;
            display: block;
            width: 50px;
            height: 3px;
            background: #e96b56;
            margin-top: 16px;
            left: calc(50% - 25px);
        }
    </style>
    <div class="h max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <h1 class="text-3xl text-center text-gray-700 font-semibold mb-8">Valores de los nutrientes en el suelo</h1>
        <p class="text-center">Estos valores son obtenidos según el cálculo realizado en base a los datos suministrados.</p>
    </div>

    <div class="container py-12 max-w-6xl mx-auto px-4 sm:px-6 lg:px-8;">
        <x-tableresponsive>
            <table class="min-w-full divide-y divide-gray-200 ">
                <thead class="bg-gray-300">
                    <tr>
                        <th scope="col"
                            class="text-center px-6 py-3 text-base font-bold text-gray-900 uppercase tracking-wider">
                            Variable
                        </th>
                        <th scope="col"
                            class="text-center px-6 py-3 text-base font-bold text-gray-900 uppercase tracking-wider">
                            Dato tomado
                        </th>
                        <th scope="col"
                            class="text-center px-6 py-3 text-base font-bold text-gray-900 uppercase tracking-wider">
                            Resultado
                        </th>
                        <th scope="col"
                            class="text-center px-6 py-3 text-base font-bold text-gray-900 uppercase tracking-wider">
                            Unidades
                        </th>
                        <th scope="col"
                            class="text-center px-6 py-3 text-base font-bold text-gray-900 uppercase tracking-wider">
                            Requerimiento nutricional del cultivo (Kg/Ha)
                        </th>
                        <th scope="col"
                            class="text-center px-6 py-3 text-base font-bold text-gray-900 uppercase tracking-wider">
                            Resultado (Kg/Ha)
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr>
                        <th class="py-3 px-3 text-left" scope="row">Nitrógeno</th>
                        <td class="text-center">{{$variables['mo']}}</td>
                        <td class="text-center">{{$resultProcess['rmo']}}</td>
                        <th  scope="row">Kg/ha </th>
                        <td>
                            <div class="py-3 text-center">
                                <x-jet-input class="form-control w-5/6"  wire:model="requirement.tmo" id="tmo" name="tmo" type="number" step="any" required placeholder="Ingresa valor teórico de Nitrógeno" aria-label="default input example"/>
                                <x-jet-input-error for="requirement.tmo" />
                            </div>
                        </td>
                        
                        <td>
                            <div class="py-3 text-center">
                                    <x-jet-input type="number" wire:model="resultRequirement.rtmo" class="form-control w-3/6"/> 
                    
                                    <p title="{{ $resultRequirement['rtmo'] > 0 ? 'Teóricamente se requiere aportar' :  ($resultRequirement['rtmo'] < 0 ? 'Teoricamente no se requiere aportar' : '' ) }}" class="w-20 text-4xl align-center
                                        {{ $resultRequirement['rtmo'] > 0 ? 'text-yellow-500 fa-solid fa-triangle-exclamation cursor-pointer' : 
                                          ($resultRequirement['rtmo'] < 0 ? 'text-green-500 fa-solid fa-circle-check cursor-pointer':'' )}} "></p>    
                    
                                <x-jet-input-error for="resultRequirement.rtmo" />
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <th class="py-3 px-3 text-left" scope="row">P ppm </th>
                        <td class="text-center">{{$variables['p']}}</td>
                        <td class="text-center">{{$resultProcess['rp']}}</td>
                        <th scope="row">Kg/ha </th>
                        <td>
                            <div class="py-3 text-center">
                                <x-jet-input class="form-control w-5/6" wire:model="requirement.tp" id="tp" name="tp" type="number" step="any" required placeholder="Ingresa valor teórico de fósforo" aria-label="default input example"/>
                                <x-jet-input-error for="requirement.tp" />
                            </div>
                        </td>
                        <td>
                            <div class="py-3 text-center">
                                    <x-jet-input type="number" wire:model="resultRequirement.rtp" class="form-control w-3/6"/> 
                    
                                    <p title="{{ $resultRequirement['rtp'] > 0 ? 'Teóricamente se requiere aportar' :  ($resultRequirement['rtp'] < 0 ? 'Teoricamente no se requiere aportar' : '' ) }}" class="w-20 text-4xl align-center
                                        {{ $resultRequirement['rtp'] > 0 ? 'text-yellow-500 fa-solid fa-triangle-exclamation cursor-pointer' : 
                                          ($resultRequirement['rtp'] < 0 ? 'text-green-500 fa-solid fa-circle-check cursor-pointer':'' )}} "></p>    
                    
                                <x-jet-input-error for="resultRequirement.rtp" />
                            </div>
                        </td>
                    </tr>
                    
                    <tr>
                        <th class="py-3 px-3 text-left" scope="row">K me/100 g </th>
                        <td class="text-center">{{$variables['k']}}</td>
                        <td class="text-center">{{$resultProcess['rk']}}</td>
                        <th scope="row">Kg/ha </th>
                        <td>
                            <div class="py-3 text-center">
                                <x-jet-input class="form-control w-5/6" wire:model="requirement.tk" id="tk" name="tk" type="number" step="any" required placeholder="Ingresa valor teórico de Potasio" aria-label="default input example"/>
                                <x-jet-input-error for="requirement.tk" />
                            </div>
                        </td>
                        <td>
                            <div class="py-3 text-center">
                                    <x-jet-input type="number" wire:model="resultRequirement.rtk" class="form-control w-3/6"/> 
                    
                                    <p title="{{ $resultRequirement['rtk'] > 0 ? 'Teóricamente se requiere aportar' :  ($resultRequirement['rtk'] < 0 ? 'Teoricamente no se requiere aportar' : '' ) }}" class="w-20 text-4xl align-center
                                        {{ $resultRequirement['rtk'] > 0 ? 'text-yellow-500 fa-solid fa-triangle-exclamation cursor-pointer' : 
                                          ($resultRequirement['rtk'] < 0 ? 'text-green-500 fa-solid fa-circle-check cursor-pointer':'' )}} "></p>    
                    
                                <x-jet-input-error for="resultRequirement.rtk" />
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <th class="py-3 px-3 text-left" scope="row">Ca me/100 g </th>
                        <td class="text-center">{{$variables['ca']}}</td>
                        <td class="text-center">{{$resultProcess['rca']}}</td>
                        <th scope="row">Kg/ha </th>
                        <td>
                            <div class="py-3 text-center">
                                <x-jet-input class="form-control w-5/6" wire:model="requirement.tca" id="tca" name="tca" type="number" step="any" required placeholder="Ingresa valor teórico de Calcio" aria-label="default input example"/>
                                <x-jet-input-error for="requirement.tca" />
                            </div>
                        </td>
                        <td>
                            <div class="py-3 text-center">
                                    <x-jet-input type="number" wire:model="resultRequirement.rtca" class="form-control w-3/6"/> 
                    
                                    <p title="{{ $resultRequirement['rtca'] > 0 ? 'Teóricamente se requiere aportar' :  ($resultRequirement['rtca'] < 0 ? 'Teoricamente no se requiere aportar' : '' ) }}" class="w-20 text-4xl align-center
                                        {{ $resultRequirement['rtca'] > 0 ? 'text-yellow-500 fa-solid fa-triangle-exclamation cursor-pointer' : 
                                          ($resultRequirement['rtca'] < 0 ? 'text-green-500 fa-solid fa-circle-check cursor-pointer':'' )}} "></p>    
                    
                                <x-jet-input-error for="resultRequirement.rtca" />
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <th class="py-3 px-3 text-left" scope="row">Mg me/100 g </th>
                        <td class="text-center">{{$variables['mg']}}</td>
                        <td class="text-center">{{$resultProcess['rmg']}}</td>
                        <th scope="row">Kg/ha </th>
                        <td>
                            <div class="py-3 text-center">
                                <x-jet-input class="form-control w-5/6" wire:model="requirement.tmg" id="tmg" name="tmg" type="number" step="any" required placeholder="Ingresa valor teórico de magnesio" aria-label="default input example"/>
                                <x-jet-input-error for="requirement.tmg" />
                            </div>
                        </td>
                        <td>
                            <div class="py-3 text-center">
                                    <x-jet-input type="number" wire:model="resultRequirement.rtmg" class="form-control w-3/6"/> 
                    
                                    <p title="{{ $resultRequirement['rtmg'] > 0 ? 'Teóricamente se requiere aportar' :  ($resultRequirement['rtmg'] < 0 ? 'Teoricamente no se requiere aportar' : '' ) }}" class="w-20 text-4xl align-center
                                        {{ $resultRequirement['rtmg'] > 0 ? 'text-yellow-500 fa-solid fa-triangle-exclamation cursor-pointer' : 
                                          ($resultRequirement['rtmg'] < 0 ? 'text-green-500 fa-solid fa-circle-check cursor-pointer':'' )}} "></p>    
                    
                                <x-jet-input-error for="resultRequirement.rtmg" />
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <th class="py-3 px-3 text-left" scope="row">S ppm </th>
                        <td class="text-center">{{$variables['s']}}</td>
                        <td class="text-center">{{$resultProcess['rs']}}</td>
                        <th scope="row">Kg/ha </th>
                        <td>
                            <div class="py-3 text-center">
                                <x-jet-input class="form-control w-5/6" wire:model="requirement.ts" id="ts" name="ts" type="number" step="any" required placeholder="Ingresa valor teórico de azufre" aria-label="default input example"/>
                                <x-jet-input-error for="requirement.ts" />
                            </div>
                        </td>
                        <td>
                            <div class="py-3 text-center">
                                    <x-jet-input type="number" wire:model="resultRequirement.rts" class="form-control w-3/6"/> 
                    
                                    <p title="{{ $resultRequirement['rts'] > 0 ? 'Teóricamente se requiere aportar' :  ($resultRequirement['rts'] < 0 ? 'Teoricamente no se requiere aportar' : '' ) }}" class="w-20 text-4xl align-center
                                        {{ $resultRequirement['rts'] > 0 ? 'text-yellow-500 fa-solid fa-triangle-exclamation cursor-pointer' : 
                                          ($resultRequirement['rts'] < 0 ? 'text-green-500 fa-solid fa-circle-check cursor-pointer':'' )}} "></p>    
                    
                                <x-jet-input-error for="resultRequirement.rts" />
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <th class="py-3 px-3 text-left" scope="row">fe ppm </th>
                        <td class="text-center">{{$variables['fe']}}</td>
                        <td class="text-center">{{$resultProcess['rfe']}}</td>
                        <th scope="row">Kg/ha </th>
                        <td>
                            <div class="py-3 text-center">
                                <x-jet-input class="form-control w-5/6" wire:model="requirement.tfe" name="tfe" type="number" step="any" required placeholder="Ingresa valor teórico de hierro" aria-label="default input example"/>
                                <x-jet-input-error for="requirement.tfe" />
                            </div>
                        </td>
                        <td>
                            <div class="py-3 text-center">
                                    <x-jet-input type="number" wire:model="resultRequirement.rtfe" class="form-control w-3/6"/> 
                    
                                    <p title="{{ $resultRequirement['rtfe'] > 0 ? 'Teóricamente se requiere aportar' :  ($resultRequirement['rtfe'] < 0 ? 'Teoricamente no se requiere aportar' : '' ) }}" class="w-20 text-4xl align-center
                                        {{ $resultRequirement['rtfe'] > 0 ? 'text-yellow-500 fa-solid fa-triangle-exclamation cursor-pointer' : 
                                          ($resultRequirement['rtfe'] < 0 ? 'text-green-500 fa-solid fa-circle-check cursor-pointer':'' )}} "></p>    
                    
                                <x-jet-input-error for="resultRequirement.rtfe" />
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <th class="py-3 px-3 text-left" scope="row">Mn ppm</th>
                        <td class="text-center">{{$variables['mn']}}</td>
                        <td class="text-center">{{$resultProcess['rmn']}}</td>
                        <th scope="row">Kg/ha </th>
                        <td>
                            <div class="py-3 text-center">
                                <x-jet-input class="form-control w-5/6" wire:model="requirement.tmn" name="tmn" type="number" step="any" required placeholder="Ingresa valor teórico de manganeso" aria-label="default input example"/>
                                <x-jet-input-error for="requirement.tmn" />
                            </div>
                        </td>
                        <td>
                            <div class="py-3 text-center">
                                    <x-jet-input type="number" wire:model="resultRequirement.rtmn" class="form-control w-3/6"/> 
                    
                                    <p title="{{ $resultRequirement['rtmn'] > 0 ? 'Teóricamente se requiere aportar' :  ($resultRequirement['rtmn'] < 0 ? 'Teoricamente no se requiere aportar' : '' ) }}" class="w-20 text-4xl align-center
                                        {{ $resultRequirement['rtmn'] > 0 ? 'text-yellow-500 fa-solid fa-triangle-exclamation cursor-pointer' : 
                                          ($resultRequirement['rtmn'] < 0 ? 'text-green-500 fa-solid fa-circle-check cursor-pointer':'' )}} "></p>    
                    
                                <x-jet-input-error for="resultRequirement.rtmn" />
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <th class="py-3 px-3 text-left" scope="row">Cu ppm</th>
                        <td class="text-center">{{$variables['cu']}}</td>
                        <td class="text-center">{{$resultProcess['rcu']}}</td>
                        <th scope="row">Kg/ha </th></div>
                        <td>
                            <div class="py-3 text-center">
                                <x-jet-input class="form-control w-5/6" wire:model="requirement.tcu" name="tcu" type="number" step="any" required placeholder="Ingresa valor teórico de cobre" aria-label="default input example"/>
                                <x-jet-input-error for="requirement.tcu" />
                            </div>
                        </td>
                        <td>
                            <div class="py-3 text-center">
                                    <x-jet-input type="number" wire:model="resultRequirement.rtcu" class="form-control w-3/6"/> 
                    
                                    <p title="{{ $resultRequirement['rtcu'] > 0 ? 'Teóricamente se requiere aportar' :  ($resultRequirement['rtcu'] < 0 ? 'Teoricamente no se requiere aportar' : '' ) }}" class="w-20 text-4xl align-center
                                        {{ $resultRequirement['rtcu'] > 0 ? 'text-yellow-500 fa-solid fa-triangle-exclamation cursor-pointer' : 
                                          ($resultRequirement['rtcu'] < 0 ? 'text-green-500 fa-solid fa-circle-check cursor-pointer':'' )}} "></p>    
                    
                                <x-jet-input-error for="resultRequirement.rtcu" />
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <th class="py-3 px-3 text-left" scope="row">Zn ppm</th>
                        <td class="text-center">{{$variables['zn']}}</td>
                        <td class="text-center">{{$resultProcess['rzn']}}</td>
                        <th scope="row">Kg/ha </th>
                        <td>
                            <div class="py-3 text-center">
                                <x-jet-input class="form-control w-5/6" wire:model="requirement.tzn" name="tzn" type="number" step="any" required placeholder="Ingresa valor teórico de zinc" aria-label="default input example"/>
                                <x-jet-input-error for="requirement.tzn" />
                            </div>
                        </td>
                        <td>
                            <div class="py-3 text-center">
                                    <x-jet-input type="number" wire:model="resultRequirement.rtzn" class="form-control w-3/6"/> 
                    
                                    <p title="{{ $resultRequirement['rtzn'] > 0 ? 'Teóricamente se requiere aportar' :  ($resultRequirement['rtzn'] < 0 ? 'Teoricamente no se requiere aportar' : '' ) }}" class="w-20 text-4xl align-center
                                        {{ $resultRequirement['rtzn'] > 0 ? 'text-yellow-500 fa-solid fa-triangle-exclamation cursor-pointer' : 
                                          ($resultRequirement['rtzn'] < 0 ? 'text-green-500 fa-solid fa-circle-check cursor-pointer':'' )}} "></p>    
                    
                                <x-jet-input-error for="resultRequirement.rtzn" />
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <th class="py-3 px-3 text-left" scope="row">CE dS/m</th>
                        <td class="text-center">{{$variables['ce']}}</td>
                        <td class="text-center">{{$resultProcess['rce']}}</td>
                        <th scope="row">dS/m </th>
                    </tr>
    
                    <tr>
                        <th class="py-3 px-3 text-left" scope="row">B ppm</th>
                        <td class="text-center">{{$variables['b']}}</td>
                        <td class="text-center">{{$resultProcess['rb']}}</td>
                        <th scope="row">kg/ha</th>
                        <td>
                            <div class="py-3 text-center">
                                <x-jet-input class="form-control w-5/6" wire:model="requirement.tb" name="tb" type="number" step="any" required placeholder="Ingresa valor teórico de boro" aria-label="default input example"/>
                                <x-jet-input-error for="requirement.tb" />
                            </div>
                        </td>
                        <td>
                            <div class="py-3 text-center">
                                    <x-jet-input type="number" wire:model="resultRequirement.rtb" class="form-control w-3/6"/> 
                    
                                    <p title="{{ $resultRequirement['rtb'] > 0 ? 'Teóricamente se requiere aportar' :  ($resultRequirement['rtb'] < 0 ? 'Teoricamente no se requiere aportar' : '' ) }}" class="w-20 text-4xl align-center
                                        {{ $resultRequirement['rtb'] > 0 ? 'text-yellow-500 fa-solid fa-triangle-exclamation cursor-pointer' : 
                                          ($resultRequirement['rtb'] < 0 ? 'text-green-500 fa-solid fa-circle-check cursor-pointer':'' )}} "></p>    
                    
                                <x-jet-input-error for="resultRequirement.rtb" />
                            </div>
                        </td>
                    </tr>
    
                    <tr>
                        <th class="py-3 px-3 text-left" scope="row">Ph</th>
                        <td class="text-center">{{$variables['ph']}}</td>
                        <td class="text-center">Ph adecuado es de 5,8 a 6,8</td>
                        <th scope="row"> </th>
                    </tr>

                    <tr>
                        <th class="py-3 px-3 text-left" scope="row">Na me/100 g</th>
                        <td class="text-center">{{$variables['na']}}</td>
                        <td class="text-center">{{$resultProcess['rna']}}</td>
                        <th scope="row">Kg/ha </th>
                        <td>
                            <div class="py-3 text-center">
                                <x-jet-input class="form-control w-5/6" wire:model="requirement.tna" name="tna" type="number" step="any" required placeholder="Ingresa valor teórico de sodio" aria-label="default input example"/>
                                <x-jet-input-error for="requirement.tna" />
                            </div>
                        </td>
                        <td>
                            <div class="py-3 text-center">
                                    <x-jet-input type="number" wire:model="resultRequirement.rtna" class="form-control w-3/6"/> 
                    
                                    <p title="{{ $resultRequirement['rtna'] > 0 ? 'Teóricamente se requiere aportar' :  ($resultRequirement['rtna'] < 0 ? 'Teóricamente no se requiere aportar' : '' ) }}" class="w-20 text-4xl align-center
                                        {{ $resultRequirement['rtna'] > 0 ? 'text-yellow-500 fa-solid fa-triangle-exclamation cursor-pointer' : 
                                          ($resultRequirement['rtna'] < 0 ? 'text-green-500 fa-solid fa-circle-check cursor-pointer':'' )}} "></p>    
                    
                                <x-jet-input-error for="resultRequirement.rtna" />
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </x-tableresponsive>
    </div>

    
</div>
