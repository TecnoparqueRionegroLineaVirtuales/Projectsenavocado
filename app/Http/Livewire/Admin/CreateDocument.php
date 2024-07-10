<?php

namespace App\Http\Livewire\Admin;

use App\Models\Author;
use App\Models\Document;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateDocument extends Component
{
    use WithFileUploads;

    public $authors=[], $status=[], $image, $file, $url_photo, $urlDocument;

    public $createForm = [
        'title' => '',
        'description' => '',
        'url_photo' => '',
        'url_file' => '',
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
        'createForm.title' => 'required',
        'createForm.description' => 'required',
        'createForm.url_photo' => 'required|max:10000|mimes:jpeg,png,jpg',
        'createForm.url_file' => 'required',
        'createForm.date_publication' => 'required',
        'createForm.author_id' => 'required',
        'createForm.status' => 'required'
    ];

    protected $authorRules = [
        'createAuthor.name' => 'required',
        'createAuthor.lastname' => 'required'
    ];

    // La siguiente función, es para mostrar un nombre legible al usuario, del dato que generó el error
    // de validación, y no el nombre del campo.
    protected $validationAttributes = [
        'createForm.title' => 'Título',
        'createForm.description' => 'Descripción',
        'createForm.url_photo' => 'Foto',
        'createForm.url_file' => 'Archivo',
        'createForm.date_publication' => 'Fecha de publicación',
        'createForm.author_id' => 'Autor',
        'createForm.status' => 'Estado',
        'createAuthor.name' => 'Nombre',
        'createAuthor.lastname' => 'Apellido'
    ];

    public function mount()
    {
        $this->getAuthors();
    }

    public function getAuthors()
    {
        $this->authors = Author::all();
    }

    public function save()
    {
        $this->validate($this->rules);

        //Cargar las imágenes en la bd y el storage

        $this->image= $this->createForm['url_photo'];
        $imageName= $this->image->getClientOriginalName();
        $urlPhoto = 'storage/img/' . $imageName;
        $this->image->storeAs('public/img', $imageName);

        //Cargar los documentos en la bd y el storage

        $this->file= $this->createForm['url_file'];
        $fileName= $this->file->getClientOriginalName();
        $urlDocument = 'storage/documents/' . $fileName;
        $this->file->storeAs('public/documents', $fileName);

        $document = new Document();
        $document->title = $this->createForm['title'];
        $document->description = $this->createForm['description'];
        $document->url_photo = $urlPhoto;
        $document->url_file = $urlDocument;
        $document->date_publication = $this->createForm['date_publication'];
        $document->author_id = $this->createForm['author_id'];
        $document->status = $this->createForm['status'];

        $document->save();
        return redirect()->route('admin.documents.index');
        
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
        return view('livewire.admin.create-document')->layout('layouts.admin');
    }
}
