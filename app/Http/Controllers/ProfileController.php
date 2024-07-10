<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    function getProfiles(){
        $profiles = Profile::select('profiles.name', 'profiles.id')
        ->get();

        $profiles_json = json_encode($profiles);  // de Odjeto a JSON.
        // $profiles_json = $profiles->toJson();  // de Odjeto a JSON.
        return $profiles_json;
    }
}
