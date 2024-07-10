<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    function getDepartments(){
        $departments = Department::select('departments.name', 'departments.id')
        ->get();

        $departments_json = json_encode($departments);  // de Odjeto a JSON.
        // $departments_json = $departments->toJson();  // de Odjeto a JSON.
        return $departments_json;
    }
}
