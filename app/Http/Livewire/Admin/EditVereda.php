<?php

namespace App\Http\Livewire\Admin;

use App\Models\Department;
use App\Models\Municipality;
use App\Models\Vereda;
use Livewire\Component;

class EditVereda extends Component
{
    public $vereda, $veredaId, $departments = [], $municipalies = [], $veredas = [];

    public $editForm = [
        'name' => '',
        'municipality_id' => '',
        'department_id' => ''
    ];

    protected $rules = [
        'editForm.municipality_id' => 'required',
        'editForm.name' => 'required',
        'editForm.department_id' => 'required'
    ];

    // La siguiente función, es para mostrar un nombre legible al usuario, del dato que generó el error
    // de validación, y no el nombre del campo.
    protected $validationAttributes = [
        'editForm.name' => 'Nombre',
        'editForm.municipality_id' => 'Municipio',
        'editForm.department_id' => 'Departamento'
    ];

    public function mount($id)
    {
        $this->getDepartments();
        $this->veredaId = $id;
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
    /*public function updatedEditFormMunicipalityId($value)
    {
        $this->reset(['veredas']);  // Se recetea la matriz, para que cargue las formaciones de otro tipo de formación.
        $this->veredas = Vereda::where('municipality_id', $value)->get();
    }*/

    public function edit()
    {
        $this->vereda = Vereda::find($this->veredaId);

        $this->editForm['name'] = $this->vereda->name;
        $this->editForm['municipality_id'] = $this->vereda->municipality_id;

        $this->editForm['department_id'] = Municipality::where('id', $this->vereda->municipality_id)
            ->select('department_id')
            ->first()
            ->toarray();

        $this->editForm['department_id'] = $this->editForm['department_id']['department_id'];
        $this->municipalies = Municipality::where('department_id', $this->editForm['department_id'])->get();
        //$this->veredas = Vereda::where('municipality_id', $this->editForm['municipality_id'])->get();
    }

    public function update()
    {
        $rules = $this->rules;

        $this->validate($rules);

        $this->vereda->name = $this->editForm['name'];
        $this->vereda->municipality_id = $this->editForm['municipality_id'];

        $this->vereda->save();

        $this->emit('updated');
    }

    public function render()
    {
        return view('livewire.admin.edit-vereda')->layout('layouts.admin');
    }
}
