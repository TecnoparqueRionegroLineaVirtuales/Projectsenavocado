<?php

namespace App\Actions\Fortify;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    public function create(array $input)
    {
        /*Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);*/

        //dd($input);

        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'profile_id' => ['required'],
            /*'country_id' => ['required'],
            'municipality_id' => ['required'],*/
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        if($input['profile_id'] != 1){
            $country_id = null;
            $municipality_id = null;
        }else{
            $country_id = null;
            if($input['nationality'] == '0'){
                $country_id = $input['country_id'];
            }

            $municipality_id = null;
            if($input['nationality'] == '1'){
                $municipality_id = $input['municipality_id'];
            }
        }

        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'profile_id' => $input['profile_id'],
            'country_id' => $country_id,
            'municipality_id' => $municipality_id,
            'password' => Hash::make($input['password']),
        ]);
    }
}
