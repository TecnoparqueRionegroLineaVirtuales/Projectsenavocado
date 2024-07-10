<?php

namespace App\Http\Livewire\Admin;

use App\Models\Module;
use Livewire\Component;
use Livewire\WithPagination;

class Modules extends Component
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
        $modules = Module::select('modules.name', 'modules.url_photo','modules.description', 'modules.id')
        ->where('modules.name', 'like', '%' . $this->search . '%')
        ->orderBy('id','desc')
        ->paginate(5);

        return view('livewire.admin.modules', compact('modules'))->layout('layouts.admin');
    }
}
