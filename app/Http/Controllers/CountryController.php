<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    function getCountries(){
        $countries = Country::select('countries.name', 'countries.id')
        ->get();

        $countries_json = json_encode($countries);  // de Odjeto a JSON.
        // $countries_json = $countries->toJson();  // de Odjeto a JSON.
        return $countries_json;
    }
}