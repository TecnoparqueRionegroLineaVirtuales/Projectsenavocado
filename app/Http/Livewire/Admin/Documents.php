<?php

namespace App\Http\Livewire\Admin;

use App\Models\Document;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;

class Documents extends Component
{
    use WithPagination;

    public $search;

    // Esta función le dice a Liveware, que este atento a cambios en la propiedad "$search".
    public function updatingSearch()
    {
        $this->resetPage(); // nos retorna a la primera página.
    }

    public function render()
    {
        $documents = Document::join('authors', 'documents.author_id', '=', 'authors.id')
        ->select('documents.title', 'documents.description','documents.url_photo', 'documents.url_file', 'documents.date_publication', 'authors.name as name_author', 'authors.lastname as lastname_author', 'documents.status', 'documents.id')
        ->where('documents.title', 'like', '%' . $this->search . '%')
        ->orderBy('id', 'desc')
        ->paginate(5);

        return view('livewire.admin.documents', compact('documents'))->layout('layouts.admin');
    }
}
