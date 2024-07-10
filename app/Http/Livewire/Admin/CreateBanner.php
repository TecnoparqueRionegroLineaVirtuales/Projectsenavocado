<?php

namespace App\Http\Livewire\Admin;

use App\Models\Banner;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateBanner extends Component
{
    use WithFileUploads;

    public  $status=[], $image, $url_photo;

    public $createForm = [
        'url_photo' => '',
        'status' => ''
    ];

    protected $rules = [
        'createForm.url_photo' => 'required|max:10000|mimes:jpeg,png,jpg',
        'createForm.status' => 'required'
    ];

    // La siguiente función, es para mostrar un nombre legible al usuario, del dato que generó el error
    // de validación, y no el nombre del campo.
    protected $validationAttributes = [
        'createForm.url_photo' => 'Foto',
        'createForm.status' => 'Estado',
    ];

    public function save()
    {
        $this->validate($this->rules);

        //Cargar las imágenes en la bd y el storage

        $this->image= $this->createForm['url_photo'];
        $imageName= $this->image->getClientOriginalName();
        $urlPhoto = 'storage/banners/' . $imageName;
        $this->image->storeAs('public/banners', $imageName);

        $banner = new Banner();
        $banner->url_photo = $urlPhoto;
        $banner->status = $this->createForm['status'];

        $banner->save();
        return redirect()->route('admin.banners.index');
        
    }

    public function render()
    {
        return view('livewire.admin.create-banner')->layout('layouts.admin');
    }
}
