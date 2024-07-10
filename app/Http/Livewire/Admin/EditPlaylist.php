<?php

namespace App\Http\Livewire\Admin;

use App\Models\Playlist;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditPlaylist extends Component
{
    use WithFileUploads;
    
    public $playlist, $playlistId, $image, $url_photo;

    public $editForm = [
        'title' => '',
        'description' => '',
        //'url_photo' => '',
        'url_playlist' => '',
        'status' => ''
    ];

    protected $rules = [
        'editForm.title' => 'required',
        'editForm.description' => 'required',
        //'editForm.url_photo' => 'required|max:10000|mimes:jpeg,png,jpg',
        'editForm.url_playlist' => 'required',
        'editForm.status' => 'required'
    ];

    // La siguiente función, es para mostrar un nombre legible al usuario, del dato que generó el error
    // de validación, y no el nombre del campo.
    protected $validationAttributes = [
        'editForm.title' => 'Título',
        'editForm.description' => 'Descripción',
        //'editForm.url_photo' => 'Foto',
        'editForm.url_playlist' => 'Url playlist',
        'editForm.status' => 'Estado'
    ];

    public function mount($id)
    {
        $this->playlistId = $id;
        $this->edit();
    }

    public function edit()
    {
        $this->playlist = Playlist::find($this->playlistId);

        $this->editForm['title'] = $this->playlist->title;
        $this->editForm['description'] = $this->playlist->description;
        //$this->editForm['url_photo'] = $this->playlist->url_photo;
        $this->editForm['url_playlist'] = $this->playlist->url_playlist;
        $this->editForm['status'] = $this->playlist->status;
    }

    public function update()
    {
        $rules = $this->rules;

        $this->validate($rules);

        //Cargar las imágenes en la bd y el storage

        /*$this->image= $this->editForm['url_photo'];*/
        /*if ($this->image->hasFile($this->editForm['url_photo'])) {*/
        /*$imageName= $this->image->getClientOriginalName();
        $urlPhoto = 'storage/img/' . $imageName;
        $this->image->storeAs('public/img', $imageName);*/
        /*}else{
            $urlPhoto=$this->document->url_photo;
        }*/

        $this->playlist->title = $this->editForm['title'];
        $this->playlist->description = $this->editForm['description'];
        /*$this->playlist->url_photo = $urlPhoto;*/
        $this->playlist->url_playlist = $this->editForm['url_playlist'];
        $this->playlist->status = $this->editForm['status'];

        $this->playlist->save();

        $this->emit('updated');
    }

    public function render()
    {
        return view('livewire.admin.edit-playlist')->layout('layouts.admin');
    }
}
