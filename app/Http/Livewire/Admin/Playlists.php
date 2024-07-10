<?php

namespace App\Http\Livewire\Admin;

use App\Models\Playlist;
use Livewire\Component;
use Livewire\WithPagination;

class Playlists extends Component
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
        $playlists = Playlist::select('playlists.title', 'playlists.description','playlists.url_photo', 'playlists.url_playlist', 'playlists.status', 'playlists.id')
        ->where('playlists.title', 'like', '%' . $this->search . '%')
        ->orderBy('id', 'asc')
        ->paginate(5);

        return view('livewire.admin.playlists', compact('playlists'))->layout('layouts.admin');
    }
}
