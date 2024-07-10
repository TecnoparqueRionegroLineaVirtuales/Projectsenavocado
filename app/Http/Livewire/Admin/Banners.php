<?php

namespace App\Http\Livewire\Admin;

use App\Models\Banner;
use Livewire\Component;
use Livewire\WithPagination;

class Banners extends Component
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
        $banners = Banner::select('banners.url_photo', 'banners.status','banners.id')
        ->where('banners.status', 'like', '%' . $this->search . '%')
        ->orderBy('id', 'desc')
        ->paginate(5);

        return view('livewire.admin.banners', compact('banners'))->layout('layouts.admin');
    }
}
