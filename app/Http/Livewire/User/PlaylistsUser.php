<?php

namespace App\Http\Livewire\User;

use App\Models\Playlist;
use Livewire\Component;

class PlaylistsUser extends Component
{
    public function render()
    {
        $playlists = Playlist::select('playlists.title', 'playlists.description','playlists.url_photo','playlists.url_playlist', 'playlists.status', 'playlists.id')
        ->orderBy('id', 'desc')
        ->get();
        return view('livewire.user.playlists-user', compact('playlists'))->layout('layouts.user');
    }
}
