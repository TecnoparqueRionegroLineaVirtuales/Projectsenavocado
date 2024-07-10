<?php

namespace App\Http\Livewire\Admin;

use App\Models\Department;
use App\Models\Municipality;
use App\Models\Station;
use App\Models\Vereda;
use Livewire\Component;

class EditStation extends Component
{
    public $station, $stationId, $departments = [], $municipalies = [], $veredas = [];

    public $editForm = [
        'code' => '',
        'name' => '',
        'longitude' => '',
        'latitude' => '',
        'municipality_id' => '',
        'department_id' => '',
        'vereda_id' => '',
        'status' => ''
    ];

    protected $rules = [
        'editForm.code' => 'unique:stations,code',
        'editForm.name' => 'required',
        'editForm.status' => 'required'
    ];

    // La siguiente función, es para mostrar un nombre legible al usuario, del dato que generó el error
    // de validación, y no el nombre del campo.
    protected $validationAttributes = [
        'editForm.code' => 'Código',
        'editForm.name' => 'Nombre',
        'editForm.latitude' => 'Latitud',
        'editForm.longitude' => 'Longitud',
        'editForm.municipality_id' => 'Municipio',
        'editForm.department_id' => 'Departamento',
        'editForm.vereda_id' => 'Vereda',
        'editForm.status' => 'Estado'
    ];

    public function mount($id)
    {
        $this->getDepartments();
        $this->stationId = $id;
        $this->edit();
    }

    public function getDepartments()
    {
        $this->departments = Department::all();
    }

    // Metodos como "updatedEditFormEducationTypeId", le indican a liveware, que al actulizar la etiquta (su value), se ejecute
    // este metodo, esto reemplaza al evento onchange de javascript.
    public function updatedEditFormDepartmentId($value)
    {
        $this->reset(['municipalies']);  // Se recetea la matriz, para que cargue las formaciones de otro tipo de formación.
        $this->municipalies = Municipality::where('department_id', $value)->get();
    }

    // Metodos como "updatedEditFormEducationTypeId", le indican a liveware, que al actulizar la etiquta (su value), se ejecute
    // este metodo, esto reemplaza al evento onchange de javascript.
    public function updatedEditFormMunicipalityId($value)
    {
        $this->reset(['veredas']);  // Se recetea la matriz, para que cargue las formaciones de otro tipo de formación.
        $this->veredas = Vereda::where('municipality_id', $value)->get();
    }

    public function edit()
    {
        $this->station = Station::find($this->stationId);

        $this->editForm['code'] = $this->station->code;
        $this->editForm['name'] = $this->station->name;
        $this->editForm['latitude'] = $this->station->latitude;
        $this->editForm['longitude'] = $this->station->longitude;
        $this->editForm['vereda_id'] = $this->station->vereda_id;
        $this->editForm['status'] = $this->station->status;
        $this->editForm['municipality_id'] = $this->station->municipality_id;

        $this->editForm['department_id'] = Municipality::where('id', $this->station->municipality_id)
            ->select('department_id')
            ->first()
            ->toarray();

        $this->editForm['department_id'] = $this->editForm['department_id']['department_id'];
        $this->municipalies = Municipality::where('department_id', $this->editForm['department_id'])->get();
        $this->veredas = Vereda::where('municipality_id', $this->editForm['municipality_id'])->get();
    }

    public function update()
    {
        $rules = $this->rules;

        // las siguientes validaciones adicionales, se hacen en los casos de querer validar "unique",
        // para solucionar el error Ejemplo: "The code_snies has already been taken.".
        $rules['editForm.code'] = 'unique:stations,code,' . $this->station->id;

        $this->validate($rules);

        $this->station->code = $this->editForm['code'];
        $this->station->name = $this->editForm['name'];
        $this->station->latitude = $this->editForm['latitude'];
        $this->station->longitude = $this->editForm['longitude'];
        $this->station->municipality_id = $this->editForm['municipality_id'];
        $this->station->vereda_id = $this->editForm['vereda_id'];
        $this->station->status = $this->editForm['status'];

        $this->station->save();

        $this->emit('updated');
    }

    public function render()
    {
        return view('livewire.admin.edit-station')->layout('layouts.admin');
    }
}
