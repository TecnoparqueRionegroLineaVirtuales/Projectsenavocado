<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Author;

class EditAuthor extends Component
{
    public $author, $authorId;

    public $editForm = [
        'name' => '',
        'lastname' => ''
    ];

    protected $rules = [
        'editForm.name' => 'required',
        'editForm.lastname' => 'required'
    ];

    // La siguiente función, es para mostrar un nombre legible al usuario, del dato que generó el error
    // de validación, y no el nombre del campo.
    protected $validationAttributes = [
        'editForm.name' => 'Nombre',
        'editForm.lastname' => 'Apellido'
    ];

    public function mount($id)
    {
        $this->authorId = $id;
        $this->edit();
    }

    public function edit()
    {
        $this->author = Author::find($this->authorId);

        $this->editForm['name'] = $this->author->name;
        $this->editForm['lastname'] = $this->author->lastname;
    }

    public function update()
    {
        $rules = $this->rules;

        $this->validate($rules);

        $this->author->name = $this->editForm['name'];
        $this->author->lastname = $this->editForm['lastname'];

        $this->author->save();

        $this->emit('updated');
    }

    public function render()
    {
        return view('livewire.admin.edit-author')->layout('layouts.admin');
    }
}
