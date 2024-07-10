<?php

namespace App\Http\Livewire\Admin;

use App\Models\Vereda;
use Livewire\Component;
use Livewire\WithPagination;

class Veredas extends Component
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
        $veredas = Vereda::join('municipalities', 'veredas.municipality_id', '=', 'municipalities.id')
        ->join('departments', 'municipalities.department_id', '=', 'departments.id')
        ->select('veredas.name', 'municipalities.name as municipality', 'departments.name as department', 'veredas.id')
        ->where('veredas.name', 'like', '%' . $this->search . '%')
        ->orderBy('id', 'desc')
        ->paginate(5);

        return view('livewire.admin.veredas', compact('veredas'))->layout('layouts.admin');
    }
}
