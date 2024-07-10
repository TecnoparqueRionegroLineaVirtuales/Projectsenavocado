<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            {{--<x-jet-authentication-card-logo />--}}
            <img style="width: 100px;" class="block h-30 w-auto" src="{{ asset('/img/logo.svg') }}" alt="">
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-jet-label for="name" value="{{ __('Nombre') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Correo') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="profile_id" value="{{ __('Perfil') }}" />
                <select class="block mt-1 w-full rounded-lg p-2" id="profile_id" name="profile_id">
                    <option value="" disabled selected>Seleccione un perfil</option>
                </select>
            </div>

            <div class="mt-4" id="lbcolombiano">
                <x-jet-label value="{{ __('¿Colombiano?') }}"  />
                <label>
                    <input type="radio" value="1" name="nationality">
                Si
                </label>

                <label>
                    <input type="radio" value="0" name="nationality" >
                No
                </label>
            </div>
                
            <div class="mt-4" id="pais">
                <x-jet-label for="country_id" value="{{ __('País') }}" />
                <select class="block mt-1 w-full rounded-lg p-2" name="country_id" id="country_id">
                    <option value="" disabled selected>Seleccione un país</option>
                </select>
            </div>

            <div id="deptmun">
                <div class="mt-4">
                    <x-jet-label for="departments" value="{{ __('Departamento') }}" />
                    <select class="block mt-1 w-full rounded-lg p-2" name="departments" id="departments">
                        <option value="" disabled selected>Seleccione un Departamento</option>
                    </select>
                </div>

                <div class="mt-4">
                    <x-jet-label for="municipalities" value="{{ __('Municipio') }}" />
                    <select class="block mt-1 w-full rounded-lg p-2" name="municipality_id" id="municipalities">
                        <option value="" disabled selected>Seleccione un municipio</option>
                    </select>
                </div>
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Contraseña') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirmar contraseña') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Registrar') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
    
    @push('script')
        <script>
            window.onload = function() {
                hiddenTags();
                getProfiles();
                getCountry();
                getDepartments();
            }

            function hiddenTags(){
                $( "#lbcolombiano" ).hide();
                $( "#pais" ).hide();
                $( "#deptmun" ).hide();
            }

            function getProfiles(){
                $.ajax({
                    type: 'GET',
                    url: "{{ route('frontend.user.getprofiles') }}",
                    success: function(profiles_json) {

                        let profiles = JSON.parse(profiles_json);


                        $.each(profiles, function(index, value) {
                            $("#profile_id").append('<option value=' + value.id + '>' + value.name +
                                '</option>');
                        });

                    },
                    error: function(xhr, status, error) {
                        let errorMessage = xhr.status + ': ' + xhr.statusText;
                        alert('Error - ' + errorMessage + ' status: ' + status + '  error: ' + error);
                    }
                });
            }

            function getCountry(){
                $.ajax({
                    type: 'GET',
                    url: "{{ route('frontend.user.getcountries') }}",
                    success: function(countries_json) {

                        let countries = JSON.parse(countries_json);


                        $.each(countries, function(index, value) {
                            $("#country_id").append('<option value=' + value.id + '>' + value.name +
                                '</option>');
                        });

                    },
                    error: function(xhr, status, error) {
                        let errorMessage = xhr.status + ': ' + xhr.statusText;
                        alert('Error - ' + errorMessage + ' status: ' + status + '  error: ' + error);
                    }
                });
            }

            function getDepartments(){
                $.ajax({
                    type: 'GET',
                    url: "{{ route('frontend.user.getdepartments') }}",
                    success: function(departments_json) {

                        let departments = JSON.parse(departments_json);


                        $.each(departments, function(index, value) {
                            $("#departments").append('<option value=' + value.id + '>' + value.name +
                                '</option>');
                        });

                    },
                    error: function(xhr, status, error) {
                        let errorMessage = xhr.status + ': ' + xhr.statusText;
                        alert('Error - ' + errorMessage + ' status: ' + status + '  error: ' + error);
                    }
                });
            }

            $("#profile_id").change(function() {
                let profileId = $(this).val();

                if(profileId == 1){
                    $( "#lbcolombiano" ).show();
                }else{
                    hiddenTags();
                }
                
            })

            $("#departments").change(function() {
                let departmentId = $(this).val();

                $.ajax({
                    type: 'GET',
                    url: "{{ route('frontend.municipalities.getmunicipalitiesfordpt') }}",
                    data: {
                        departmentId: departmentId
                    },
                    contentType: 'application/json',
                    success: function($municipalities_json) {

                        let munfordpt = JSON.parse($municipalities_json); // Parsing the json string.

                        $('#municipalities').empty();

                        $.each(munfordpt, function(index, value) {
                            $("#municipalities").append('<option value=' + value.id + '>' + value
                                .name + '</option>');
                        });
                    },
                    error: function(xhr, status, error) {
                        let errorMessage = xhr.status + ': ' + xhr.statusText;
                        alert('Error - ' + errorMessage + ' status: ' + status + '  error: ' + error);
                    }
                });
            })

            $('input[type=radio][name=nationality]').change(function() {
                if (this.value == '1') {
                    $( "#deptmun" ).show();
                    $( "#pais" ).hide();
                }
                else if (this.value == '0') {
                    $( "#deptmun" ).hide();
                    $( "#pais" ).show();
                }
            });
        </script>
    @endpush
</x-guest-layout>
