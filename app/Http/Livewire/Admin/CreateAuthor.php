<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Author;

class CreateAuthor extends Component
{
    public $createForm = [
        'name' => '',
        'lastname' => ''
    ];

    protected $rules = [
        'createForm.name' => 'required',
        'createForm.lastname' => 'required'
    ];

    // La siguiente función, es para mostrar un nombre legible al usuario, del dato que generó el error
    // de validación, y no el nombre del campo.
    protected $validationAttributes = [
        'createForm.name' => 'Nombre',
        'createForm.lastname' => 'Apellido'
    ];

    public function save()
    {
        $this->validate($this->rules);

        $author = new Author();
        $author->name = $this->createForm['name'];
        $author->lastname = $this->createForm['lastname'];

        $author->save();
        return redirect()->route('admin.authors.index');
        
    }

    public function render()
    {
        return view('livewire.admin.create-author')->layout('layouts.admin');
    }
}
