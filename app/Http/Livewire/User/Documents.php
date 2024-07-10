<?php

namespace App\Http\Livewire\User;

use App\Models\Document;
use Livewire\Component;

class Documents extends Component
{
    public function render()
    {
        $documents = Document::join('authors', 'documents.author_id', '=', 'authors.id')
        ->select('documents.title', 'documents.description','documents.url_photo','documents.url_file','documents.date_publication', 'documents.status', 'authors.name as name_author', 'authors.lastname as lastname_author', 'documents.id')
        ->orderBy('id', 'desc')
        ->get();

        return view('livewire.user.documents', compact('documents'))->layout('layouts.user');
    }

    //Método para descargar documento
    /*public function download()
    {
     $pathToFile = storage_path("app/public/documents/" . Document::select('documents.url_file'));
        return response()->download($pathToFile);   
    }*/
    
}
