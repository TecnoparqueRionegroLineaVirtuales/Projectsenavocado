<?php

namespace App\Http\Livewire\Admin;

use App\Models\Playlist;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreatePlaylist extends Component
{
    use WithFileUploads;

    public $image, $url_photo;

    public $createForm = [
        'title' => '',
        'description' => '',
        'url_photo' => '',
        'url_playlist' => '',
        'status' => ''
    ];

    protected $rules = [
        'createForm.title' => 'required',
        'createForm.description' => 'required',
        'createForm.url_photo' => 'required|max:10000|mimes:jpeg,png,jpg',
        'createForm.url_playlist' => 'required',
        'createForm.status' => 'required'
    ];

    // La siguiente función, es para mostrar un nombre legible al usuario, del dato que generó el error
    // de validación, y no el nombre del campo.
    protected $validationAttributes = [
        'createForm.title' => 'Título',
        'createForm.description' => 'Descripción',
        'createForm.url_photo' => 'Foto',
        'createForm.url_playlist' => 'Url playlist',
        'createForm.status' => 'Estado'
    ];

    public function save()
    {
        $this->validate($this->rules);

        //Cargar las imágenes en la bd y el storage

        $this->image= $this->createForm['url_photo'];
        $imageName= $this->image->getClientOriginalName();
        $urlPhoto = 'storage/img/' . $imageName;
        $this->image->storeAs('public/img', $imageName);

        $playlist = new Playlist();
        $playlist->title = $this->createForm['title'];
        $playlist->description = $this->createForm['description'];
        $playlist->url_photo = $urlPhoto;
        $playlist->url_playlist = $this->createForm['url_playlist'];
        $playlist->status = $this->createForm['status'];

        $playlist->save();
        return redirect()->route('admin.playlists.index');
        
    }

    public function render()
    {
        return view('livewire.admin.create-playlist')->layout('layouts.admin');
    }
}
