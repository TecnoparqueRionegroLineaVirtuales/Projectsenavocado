<?php

namespace App\Http\Livewire\Admin;

use App\Models\Format;
use App\Models\Module;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateFormat extends Component
{
    use WithFileUploads;

    public $modules=[], $file, $urlFormat;

    public $createForm = [
        'url' => '',
        'module_id' => ''
    ];

    protected $rules = [
        'createForm.url' => 'required',
        'createForm.module_id' => 'required'
    ];

    // La siguiente función, es para mostrar un nombre legible al usuario, del dato que generó el error
    // de validación, y no el nombre del campo.
    protected $validationAttributes = [
        'createForm.url' => 'Archivo',
        'createForm.module_id' => 'Módulo',
    ];

    public function mount()
    {
        $this->getModules();
    }

    public function getModules()
    {
        $this->modules = Module::all();
    }

    public function save()
    {
        $this->validate($this->rules);

        //Cargar los documentos en la bd y el storage

        $this->file= $this->createForm['url'];
        $fileName= $this->file->getClientOriginalName();
        $urlFormat = 'storage/formats/' . $fileName;
        $this->file->storeAs('public/formats', $fileName);

        $format = new Format();
        $format->url = $urlFormat;
        $format->module_id = $this->createForm['module_id'];

        $format->save();
        return redirect()->route('admin.formats.index');
    }

    public function render()
    {
        return view('livewire.admin.create-format')->layout('layouts.admin');
    }
}
