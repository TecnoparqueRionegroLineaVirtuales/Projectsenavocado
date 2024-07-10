<?php

namespace App\Http\Livewire\Admin;

use App\Models\Banner;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditBanner extends Component
{
    use WithFileUploads;
    
    public $banner, $bannerId, $status = [], $image, $url_photo;

    public $editForm = [
        'url_photo' => '',
        //'status' => ''
    ];

    protected $rules = [
        'editForm.url_photo' => 'required|max:10000|mimes:jpeg,png,jpg',
        //'editForm.status' => 'required'
    ];

    // La siguiente función, es para mostrar un nombre legible al usuario, del dato que generó el error
    // de validación, y no el nombre del campo.
    protected $validationAttributes = [
        'editForm.url_photo' => 'Foto',
        //'editForm.status' => 'Estado'
    ];

    public function mount($id)
    {
        $this->bannerId = $id;
        $this->edit();
    }

    public function edit()
    {
        $this->banner = Banner::find($this->bannerId);

        $this->editForm['url_photo'] = $this->banner->url_photo;
        //$this->editForm['status'] = $this->banner->status;
    }

    public function update()
    {
        $rules = $this->rules;

        $this->validate($rules);

        //Cargar las imágenes en la bd y el storage

        $this->image= $this->editForm['url_photo'];
        /*if ($image->hasFile($this->editForm['url_photo'])) {*/
        $imageName= $this->image->getClientOriginalName();
        $urlPhoto = 'storage/banner/' . $imageName;
        $this->image->storeAs('public/banner', $imageName);
        /*}else{
            $urlPhoto=$this->document->url_photo;
        }*/

        $this->banner->url_photo = $urlPhoto;
        //$this->banner->status = $this->editForm['status'];

        $this->banner->save();

        $this->emit('updated');
    }

    public function render()
    {
        return view('livewire.admin.edit-banner')->layout('layouts.admin');
    }
}
