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
    <div class="h max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <h1 class="text-3xl text-center text-gray-700 font-semibold mb-8">CALCULADORA DE FERTILIZACIÓN</h1>
        <p class="text-center">Favor ingresa todos los datos pedidos. Así podrás calcular el contenido de los nutrientes en el suelo.</p>
    </div>

    <div class="container py-12 max-w-6xl mx-auto px-4 sm:px-6 lg:px-8;">
        {{--<form method="post" action="">
            @csrf--}}
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
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-none">
                        <tr>
                            <th scope="col">Densidad Aparente (g/cm^3)</th>
                            <td>
                                <div class="py-3">
                                    <x-jet-input class="form-control w-full" wire:model="data.da" name="da" type="number" step="any" required placeholder="Ingresa valor Densidad Aparente" aria-label="default input example"/>
                                    <x-jet-input-error for="data.da" />
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="col">Profundidad [mt]</th>
                            <td>
                                <div class="py-3">
                                    <x-jet-input class="form-control w-full" wire:model="data.prof" name="prof" type="number" step="any" required placeholder="Ingresa valor Profundidad" aria-label="default input example"/>
                                    <x-jet-input-error for="data.prof" />
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="col">Clima</th>
                            <td>
                                <div class="py-3">
                                    <select class="form-control w-full rounded-lg p-2" wire:model="data.tm" name="tm" required aria-label=".form-select-sm example">
                                        <option selected>Selecciona el tipo de clima</option>
                                        <option value="calido">Cálido mayor a 24 °c </option>
                                        <option value="templado">Templado entre 17 a 24°c </option>
                                        <option value="frio">Frío menor a 17°c </option>
                                    </select><br>
                                    <x-jet-input-error for="data.tm" />
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="col">Materia Orgánica [%] </th>
                            <td>
                                <div class="py-3">
                                    <x-jet-input class="form-control w-full" wire:model="data.mo" name="mo" type="number" step="any" required placeholder="Ingresa el valor de Materia orgánica" aria-label="default input example"/>
                                    <x-jet-input-error for="data.mo" />
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="col">Fósforo (P) [ppm] </th>
                            <td>
                                <div class="py-3">
                                    <x-jet-input class="form-control w-full" wire:model="data.p" name="p" type="number" step="any" required placeholder="Ingresar el valor de Fósforo " aria-label="default input example"/>
                                    <x-jet-input-error for="data.p" />
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="col">Potasio (k) [me/100 g] </th>
                            <td>
                                <div class="py-3">
                                    <x-jet-input class="form-control w-full" wire:model="data.k" name="k" type="number" step="any" required placeholder="Ingresar el valor de Potasio " aria-label="default input example"/>
                                    <x-jet-input-error for="data.k" />
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="col">Calcio (Ca) [me/100 g] </th>
                            <td>
                                <div class="py-3">
                                    <x-jet-input class="form-control w-full" wire:model="data.ca" name="ca" type="number" step="any" required placeholder="Ingresar el valor de Calcio " aria-label="default input example"/>
                                    <x-jet-input-error for="data.ca" />
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="col">Magnesio (Mg) [me/100 g] </th>
                            <td>
                                <div class="py-3">
                                    <x-jet-input class="form-control w-full" wire:model="data.mg" name="mg" type="number" step="any" required placeholder="Ingresar el valor de Magnesio " aria-label="default input example"/>
                                    <x-jet-input-error for="data.mg" />
                                </div>
                            </td> 
                        </tr>
                        <tr>
                            <th scope="col">Azufre (S) [ppm] </th>
                            <td>
                                <div class="py-3">
                                    <x-jet-input class="form-control w-full" wire:model="data.s" name="s" type="number" step="any" required placeholder="Ingresar el valor de Azufre" aria-label="default input example"/>
                                    <x-jet-input-error for="data.s" />
                                </div>
                            </td> 
                        </tr>
                        <tr>
                            <th scope="col">Hierro (fe) [ppm] </th>
                            <td>
                                <div class="py-3">
                                    <x-jet-input class="form-control w-full" wire:model="data.fe" name="fe" type="number" step="any" required placeholder="Ingresar el valor de Hierro " aria-label="default input example"/>
                                    <x-jet-input-error for="data.fe" />
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="col">Manganeso (Mn) [ppm]</th>
                            <td>
                                <div class="py-3">
                                    <x-jet-input class="form-control w-full" wire:model="data.mn" name="mn" type="number" step="any" required placeholder="Ingresar el valor de Manganeso " aria-label="default input example"/>
                                    <x-jet-input-error for="data.mn" />
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="col">Cobre (Cu) [ppm]</th>
                            <td>
                                <div class="py-3">
                                    <x-jet-input class="form-control w-full" wire:model="data.cu" name="cu" type="number" step="any" required placeholder="Ingresar el valor de Cobre " aria-label="default input example"/>
                                    <x-jet-input-error for="data.cu" />
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="col">Zinc (Zn) [ppm]</th>
                            <td>
                                <div class="py-3">
                                    <x-jet-input class="form-control w-full" wire:model="data.zn" name="zn" type="number" step="any" required placeholder="Ingresar el valor de Zinc" aria-label="default input example"/>
                                    <x-jet-input-error for="data.zn" />
                                </div>
                            </td>
                        </tr>
                        </tr>
                            <th scope="col">Boro (B) [ppm]</th>
                            <td>
                                <div class="py-3">
                                    <x-jet-input class="form-control w-full" wire:model="data.b" name="b" type="number" step="any" required placeholder="Ingresar el valor de Boro" aria-label="default input example"/>
                                    <x-jet-input-error for="data.b" />
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="col">CE (Conductividad eléctrica) [dS/m]</th>
                            <td>
                                <div class="py-3">
                                    <x-jet-input class="form-control w-full" wire:model="data.ce" name="ce" type="number" step="any" required placeholder="Ingresar el valor de Conductividad eléctrica" aria-label="default input example"/>
                                    <x-jet-input-error for="data.ce" />
                                </td>
                            </div>

                        </tr>
                        <tr>
                            <th scope="col">Ph ideal (5.8 a 6.8)</th>
                            <td>
                                <div class="py-3">
                                    <x-jet-input class="form-control w-full" wire:model="data.ph" name="ph" type="number" step="any" required placeholder="Ingresar el valor del Ph" aria-label="default input example"/>
                                    <x-jet-input-error for="data.ph" />
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="col">Sodio ideal (<1)</th>
                            <td>
                                <div class="py-3">
                                    <x-jet-input class="form-control w-full" wire:model="data.na" name="na" type="number" step="any" required placeholder="Ingresar el valor de Sodio" aria-label="default input example"/>
                                    <x-jet-input-error for="data.na" />
                                </div>
                            </td>
                        </tr>

                        <div class="mx-auto">
                            <th colspan="2" class="py-10">
                                <x-jet-button class="border-yellow-600 bg-yellow-600" wire:loading.attr="disabled" wire:target="process" class="" wire:click="process">
                                    Calcular
                                </x-jet-button>
                            </th>
                        </div>
                    </tbody>
                </table>
            </x-tableresponsive>
        {{--</form>--}}
    </div>
</div>
