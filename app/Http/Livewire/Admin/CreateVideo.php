<?php

namespace App\Http\Livewire\Admin;

use App\Models\Video;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateVideo extends Component
{
    use WithFileUploads;

    public $image, $file, $url_photo, $urlDocument;

    public $createForm = [
        'url' => '',
        'date' => '',
        'status' => ''
    ];

    protected $rules = [
        'createForm.url' => 'required',
        'createForm.date' => 'required',
        'createForm.status' => 'required'
    ];

    // La siguiente función, es para mostrar un nombre legible al usuario, del dato que generó el error
    // de validación, y no el nombre del campo.
    protected $validationAttributes = [
        'createForm.url' => 'Título',
        'createForm.date' => 'Descripción',
        'createForm.status' => 'Estado'
    ];

    public function save()
    {
        $this->validate($this->rules);

        //Cargar las imágenes en la bd y el storage

        /*$this->image= $this->createForm['url_photo'];
        $imageName= $this->image->getClientOriginalName();
        $urlPhoto = 'storage/img/' . $imageName;
        $this->image->storeAs('public/img', $imageName);*/

        $video = new Video();
        $video->url = $this->createForm['url'];
        $video->date = $this->createForm['date'];
        //$video->url_photo = $urlPhoto;
        $video->status = $this->createForm['status'];

        $video->save();
        return redirect()->route('admin.videos.index');
        
    }

    public function render()
    {
        return view('livewire.admin.create-video')->layout('layouts.admin');
    }
}
