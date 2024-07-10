<?php

namespace App\Http\Livewire\Admin;

use App\Models\Author;
use App\Models\Document;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditDocument extends Component
{
    use WithFileUploads;
    
    public $document, $documentId, $authors = [], $status = [], $image, $file, $url_photo, $urlDocument;

    public $editForm = [
        'title' => '',
        'description' => '',
        /*'url_photo' => '',
        'url_file' => '',*/
        'date_publication' => '',
        'author_id' => '',
        'status' => ''
    ];

    public $createAuthor = [
        'open' => false,
        'name' => '',
        'lastname' => ''
    ];

    protected $rules = [
        'editForm.title' => 'required',
        'editForm.description' => 'required',
        /*'editForm.url_photo' => 'required|max:10000|mimes:jpeg,png,jpg',
        'editForm.url_file' => 'required',*/
        'editForm.date_publication' => 'required',
        'editForm.author_id' => 'required',
        'editForm.status' => 'required'
    ];

    protected $authorRules = [
        'createAuthor.name' => 'required',
        'createAuthor.lastname' => 'required'
    ];

    // La siguiente función, es para mostrar un nombre legible al usuario, del dato que generó el error
    // de validación, y no el nombre del campo.
    protected $validationAttributes = [
        'editForm.title' => 'Título',
        'editForm.description' => 'Descripción',
        /*'editForm.url_photo' => 'Foto',
        'editForm.url_file' => 'Archivo',*/
        'editForm.date_publication' => 'Fecha de publicación',
        'editForm.author_id' => 'Autor',
        'editForm.status' => 'Estado',
        'createAuthor.name' => 'Nombre',
        'createAuthor.lastname' => 'Apellido'
    ];

    public function mount($id)
    {
        $this->getAuthors();
        $this->documentId = $id;
        $this->edit();
    }

    public function getAuthors()
    {
        $this->authors = Author::all();
    }

    public function edit()
    {
        $this->document = Document::find($this->documentId);

        $this->editForm['title'] = $this->document->title;
        $this->editForm['description'] = $this->document->description;
        /*$this->editForm['url_photo'] = $this->document->url_photo;
        $this->editForm['url_file'] = $this->document->url_file;*/
        $this->editForm['date_publication'] = $this->document->date_publication;
        $this->editForm['author_id'] = $this->document->author_id;
        $this->editForm['status'] = $this->document->status;
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

        //Cargar los documentos en la bd y el storage

        /*$this->file= $this->editForm['url_file'];
        $fileName= $this->file->getClientOriginalName();
        $urlDocument = 'storage/documents/' . $fileName;
        $this->file->storeAs('public/documents', $fileName);*/

        $this->document->title = $this->editForm['title'];
        $this->document->description = $this->editForm['description'];
        /*$this->document->url_photo = $urlPhoto;
        $this->document->url_file = $urlDocument;*/
        $this->document->date_publication = $this->editForm['date_publication'];
        $this->document->author_id = $this->editForm['author_id'];
        $this->document->status = $this->editForm['status'];

        $this->document->save();

        $this->emit('updated');
    }

    public function add(){
        $this->createAuthor['open'] = 'true';
    }

    public function saveAuthor(){

        $this->validate($this->authorRules);

        $author = Author::create([
            'name' => $this->createAuthor['name'],
            'lastname' => $this->createAuthor['lastname']
        ]);

        $this->reset('createAuthor');
        $this->getAuthors();
    }

    public function render()
    {
        return view('livewire.admin.edit-document')->layout('layouts.admin');
    }
}
