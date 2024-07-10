<?php

namespace App\Http\Livewire\Admin;

use App\Models\Module;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateModule extends Component
{
    use WithFileUploads;

    public $image, $file, $url_photo;

    public $createForm = [
        'name' => '',
        'description' => '',
        'url_photo' => ''
    ];

    protected $rules = [
        'createForm.name' => 'required',
        'createForm.description' => 'required',
        'createForm.url_photo' => 'required|max:10000|mimes:jpeg,png,jpg,svg'
    ];

    // La siguiente función, es para mostrar un nombre legible al usuario, del dato que generó el error
    // de validación, y no el nombre del campo.
    protected $validationAttributes = [
        'createForm.name' => 'Título',
        'createForm.description' => 'Descripción',
        'createForm.url_photo' => 'Foto'
    ];

    public function save()
    {
        $this->validate($this->rules);

        //Cargar iconos en la bd y el storage

        $this->image= $this->createForm['url_photo'];
        $imageName= $this->image->getClientOriginalName();
        $urlPhoto = 'storage/icons/' . $imageName;
        $this->image->storeAs('public/icons', $imageName);

        $module = new Module();
        $module->name = $this->createForm['name'];
        $module->description = $this->createForm['description'];
        $module->url_photo = $urlPhoto;

        $module->save();
        return redirect()->route('admin.modules.index');
        
    }

    public function render()
    {
        return view('livewire.admin.create-module')->layout('layouts.admin');
    }
}
