<?php

namespace App\Http\Livewire\Admin;

use App\Models\Video;
use Livewire\Component;
use Livewire\WithPagination;

class Videos extends Component
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
        $videos = Video::select('videos.url', 'videos.status','videos.date', 'videos.id')
        ->where('videos.status', 'like', '%' . $this->search . '%')
        ->orderBy('id', 'desc')
        ->paginate(5);
        
        return view('livewire.admin.videos', compact('videos'))->layout('layouts.admin');
    }
}
