<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;

class DownloadDocument extends Controller
{
   /* public function index()
    {
        $documents = Document::join('authors', 'documents.author_id', '=', 'authors.id')
        ->select('documents.title', 'documents.description','documents.url_photo', 'documents.url_file', 'documents.date_publication', 'authors.name as name_author', 'authors.lastname as lastname_author', 'documents.id')
        ->where('authors.lastname', 'like', '%' . $this->search . '%')
        ->orderBy('id', 'desc')
        ->paginate(5);

        return view ('livewire.admin.documents')
            ->with('documents', $documents);
    }*/

    public function downcurriculum($id)
    {
        $cartilla = Document::select('url_file')->find($id);

        $pathToCurriculum = $cartilla->url_file;
        return response()->download($pathToCurriculum);

        /*if (empty($curriculum) || is_null($curriculum)) {
            Flash::error(__('Document not found'));
            return redirect(route('backend.driver.index'));
        }*/
    }

}
