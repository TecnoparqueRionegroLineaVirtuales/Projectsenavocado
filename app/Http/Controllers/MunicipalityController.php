<?php

namespace App\Http\Controllers;

use App\Models\Municipality;
use Illuminate\Http\Request;

class MunicipalityController extends Controller
{
    function getMunicipalitiesForDpt(Request $request){
        $input = $request->all();
        $id = $input['departmentId'];

        $municipalities = Municipality::select('municipalities.name', 'municipalities.id')
        ->where('municipalities.department_id', $id)
        ->get();

        $municipalities_json = json_encode($municipalities);  // de Odjeto a JSON.
        // $municipalities_json = $municipalities->toJson();  // de Odjeto a JSON.
        return $municipalities_json;
    }

}
