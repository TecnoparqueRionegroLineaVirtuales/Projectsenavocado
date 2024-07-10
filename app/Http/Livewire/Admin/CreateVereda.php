<?php

namespace App\Http\Livewire\Admin;

use App\Models\Department;
use App\Models\Municipality;
use App\Models\Vereda;
use Livewire\Component;

class CreateVereda extends Component
{
    public $departments = [], $municipalies = [], $veredas = [];

    public $createForm = [
        'name' => '',
        'municipality_id' => '',
        'department_id' => ''
    ];

    protected $rules = [
        'createForm.name' => 'required',
        'createForm.municipality_id' => 'required',
        'createForm.department_id' => 'required'
    ];

    // La siguiente función, es para mostrar un nombre legible al usuario, del dato que generó el error
    // de validación, y no el nombre del campo.
    protected $validationAttributes = [
        'createForm.name' => 'Nombre',
        'createForm.municipality_id' => 'Municipio',
        'createForm.department_id' => 'Departamento'
    ];

    public function mount()
    {
        $this->getDepartments();
    }

    public function getDepartments(){
        $this->departments = Department::all();
    }

    // Metodos como "updatedcreateFormEducationTypeId", le indican a liveware, que al actulizar la etiquta (su value), se ejecute
    // este metodo, esto reemplaza al evento onchange de javascript.
    public function updatedCreateFormDepartmentId($value)
    {
        $this->reset(['municipalies']);  // Se recetea la matriz, para que cargue las formaciones de otro tipo de formación.
        $this->municipalies = Municipality::where('department_id', $value)->get();
    }

    // Metodos como "updatedcreateFormEducationTypeId", le indican a liveware, que al actulizar la etiquta (su value), se ejecute
    // este metodo, esto reemplaza al evento onchange de javascript.
    /*public function updatedCreateFormMunicipalityId($value)
    {
        $this->reset(['veredas']);  // Se recetea la matriz, para que cargue las formaciones de otro tipo de formación.
        $this->veredas = Vereda::where('municipality_id', $value)->get();
    }*/

    public function save()
    {
        $this->validate($this->rules);

        $vereda = new Vereda();
        $vereda->name = $this->createForm['name'];
        $vereda->municipality_id = $this->createForm['municipality_id'];

        $vereda->save();
        return redirect()->route('admin.veredas.index');
    }

    public function render()
    {
        return view('livewire.admin.create-vereda')->layout('layouts.admin');
    }
}
