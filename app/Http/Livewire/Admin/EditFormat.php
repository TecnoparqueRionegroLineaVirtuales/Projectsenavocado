<?php

namespace App\Http\Livewire\Admin;

use App\Models\Format;
use App\Models\Module;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditFormat extends Component
{
    use WithFileUploads;
    
    public $format, $formatId, $modules = [], $file, $urlFormat;

    public $editForm = [
        'url' => '',
        'module_id' => ''
    ];

    protected $rules = [
        'editForm.url' => 'required',
        'editForm.module_id' => 'required'
    ];

    // La siguiente función, es para mostrar un nombre legible al usuario, del dato que generó el error
    // de validación, y no el nombre del campo.
    protected $validationAttributes = [
        'editForm.url' => 'Archivo',
        'editForm.module_id' => 'Módulo'
    ];

    public function mount($id)
    {
        $this->getModules();
        $this->formatId = $id;
        $this->edit();
    }

    public function getModules()
    {
        $this->modules = Module::all();
    }

    public function edit()
    {
        $this->format = Format::find($this->formatId);

        $this->editForm['url'] = $this->format->url;
        $this->editForm['module_id'] = $this->format->module_id;
    }

    public function update()
    {
        $rules = $this->rules;

        $this->validate($rules);

        //Cargar los documentos en la bd y el storage

        $this->file= $this->editForm['url'];
        $fileName= $this->file->getClientOriginalName();
        $urlFormat = 'storage/formats/' . $fileName;
        $this->file->storeAs('public/formats', $fileName);

        $this->format->url = $urlFormat;
        $this->format->module_id = $this->editForm['module_id'];

        $this->format->save();

        $this->emit('updated');
    }

    public function render()
    {
        return view('livewire.admin.edit-format')->layout('layouts.admin');
    }
}
