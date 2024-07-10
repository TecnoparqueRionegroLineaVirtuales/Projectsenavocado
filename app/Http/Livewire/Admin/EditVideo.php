<?php

namespace App\Http\Livewire\Admin;

use App\Models\Video;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditVideo extends Component
{
    use WithFileUploads;
    
    public $video, $videoId;

    public $editForm = [
        'url' => '',
        'date' => '',
        //'status' => ''
    ];

    protected $rules = [
        'editForm.url' => 'required',
        'editForm.date' => 'required',
        //'editForm.status' => 'required'
    ];

    // La siguiente función, es para mostrar un nombre legible al usuario, del dato que generó el error
    // de validación, y no el nombre del campo.
    protected $validationAttributes = [
        'editForm.url' => 'Título',
        'editForm.date' => 'Descripción',
        //'editForm.status' => 'Estado'
    ];

    public function mount($id)
    {
        $this->videoId = $id;
        $this->edit();
    }

    public function edit()
    {
        $this->video = Video::find($this->videoId);

        $this->editForm['url'] = $this->video->url;
        $this->editForm['date'] = $this->video->date;
        //$this->editForm['status'] = $this->video->status;
    }

    public function update()
    {
        $rules = $this->rules;

        $this->validate($rules);

        $this->video->url = $this->editForm['url'];
        $this->video->date = $this->editForm['date'];
        //$this->video->status = $this->editForm['status'];

        $this->video->save();

        $this->emit('updated');
    }

    public function render()
    {
        return view('livewire.admin.edit-video')->layout('layouts.admin');
    }
}
