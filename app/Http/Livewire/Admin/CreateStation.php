<?php

namespace App\Http\Livewire\Admin;

use App\Models\Department;
use App\Models\Municipality;
use App\Models\Station;
use App\Models\Vereda;
use Livewire\Component;

class CreateStation extends Component
{
    public $departments = [], $municipalies = [], $veredas = [];

    public $createForm = [
        'code' => '',
        'name' => '',
        'latitude' => '',
        'longitude' => '',
        'municipality_id' => '',
        'department_id' => '',
        'vereda_id' => '',
        'status' => ''
    ];

    protected $rules = [
        'createForm.code' => 'unique:stations,code',
        'createForm.name' => 'required',
        'createForm.status' => 'required'
    ];

    // La siguiente función, es para mostrar un nombre legible al usuario, del dato que generó el error
    // de validación, y no el nombre del campo.
    protected $validationAttributes = [
        'createForm.code' => 'Código',
        'createForm.name' => 'Nombre',
        'createForm.latitude' => 'Latitud',
        'createForm.longitude' => 'Longitud',
        'createForm.municipality_id' => 'Municipio',
        'createForm.vereda_id' => 'Vereda',
        'createForm.department_id' => 'Departamento',
        'createForm.status' => 'Estado'
    ];

    public function mount()
    {
        $this->getDepartments();
    }

    public function getDepartments()
    {
        $this->departments = Department::all();
    }

    /*public function getMunicipalies()
    {
        $this->municipalies = Municipality::all();
    }*/

    // Metodos como "updatedcreateFormEducationTypeId", le indican a liveware, que al actulizar la etiquta (su value), se ejecute
    // este metodo, esto reemplaza al evento onchange de javascript.
    public function updatedCreateFormDepartmentId($value)
    {
        $this->reset(['municipalies']);  // Se recetea la matriz, para que cargue las formaciones de otro tipo de formación.
        $this->municipalies = Municipality::where('department_id', $value)->get();
    }

    // Metodos como "updatedcreateFormEducationTypeId", le indican a liveware, que al actulizar la etiquta (su value), se ejecute
    // este metodo, esto reemplaza al evento onchange de javascript.
    public function updatedCreateFormMunicipalityId($value)
    {
        $this->reset(['veredas']);  // Se recetea la matriz, para que cargue las formaciones de otro tipo de formación.
        $this->veredas = Vereda::where('municipality_id', $value)->get();
    }

    public function save()
    {
        $this->validate($this->rules);

        $station = new Station();
        $station->code = $this->createForm['code'];
        $station->name = $this->createForm['name'];
        $station->latitude = $this->createForm['latitude'];
        $station->longitude = $this->createForm['longitude'];
        $station->municipality_id = $this->createForm['municipality_id'];
        $station->vereda_id = $this->createForm['vereda_id'];
        $station->status = $this->createForm['status'];

        $station->save();
        return redirect()->route('admin.stations.index');
    }

    public function render()
    {
        return view('livewire.admin.create-station')->layout('layouts.admin');
    }
}
