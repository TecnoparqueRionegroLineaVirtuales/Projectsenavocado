<?php

namespace App\Http\Livewire\Admin;

use App\Models\Module;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditModule extends Component
{
    use WithFileUploads;
    
    public $module, $moduleId;

    public $editForm = [
        'name' => '',
        'description' => '',
        //'url_photo' => ''
    ];

    protected $rules = [
        'editForm.name' => 'required',
        'editForm.description' => 'required',
        //'editForm.url_photo' => 'required|max:10000|mimes:jpeg,png,jpg,svg'
    ];

    // La siguiente función, es para mostrar un nombre legible al usuario, del dato que generó el error
    // de validación, y no el nombre del campo.
    protected $validationAttributes = [
        'editForm.name' => 'Nombre',
        'editForm.description' => 'Descripción',
        //'editForm.url_photo' => 'Foto'
    ];

    public function mount($id)
    {
        $this->moduleId = $id;
        $this->edit();
    }

    public function edit()
    {
        $this->module = Module::find($this->moduleId);

        $this->editForm['name'] = $this->module->name;
        $this->editForm['description'] = $this->module->description;
        //$this->editForm['url_photo'] = $this->module->url_photo;
    }

    public function update()
    {
        $rules = $this->rules;

        $this->validate($rules);

        //Cargar las imágenes en la bd y el storage

        /*$this->image= $this->editForm['url_photo'];
        $imageName= $this->image->getClientOriginalName();
        $urlPhoto = 'storage/img/' . $imageName;
        $this->image->storeAs('public/img', $imageName);*/

        $this->module->name = $this->editForm['name'];
        $this->module->description = $this->editForm['description'];
       // $this->module->url_photo = $urlPhoto;

        $this->module->save();

        $this->emit('updated');
    }

    public function render()
    {
        return view('livewire.admin.edit-module')->layout('layouts.admin');
    }
}
