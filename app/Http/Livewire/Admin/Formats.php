<?php

namespace App\Http\Livewire\Admin;

use App\Models\Format;
use Livewire\Component;
use Livewire\WithPagination;

class Formats extends Component
{
    use WithPagination;

    public $search;
    //public $format_id = '';

    // Esta función le dice a Liveware, que este atento a cambios en la propiedad "$search".
    public function updatingSearch()
    {
        $this->resetPage(); // nos retorna a la primera página.
    }

    // Metodos como "updatedMunicipalityId", le indican a liveware, que al actulizar la etiquta (su value), se ejecute
    // este metodo, esto reemplaza al evento onchange de javascript.
    /*public function updatedFormatId($value)
    {
        session(['currentFormatId' => $value]);
    }*/

    public function render()
    {
        $formats = Format::join('modules', 'formats.module_id', '=', 'modules.id')
        ->select('formats.url', 'modules.name as name_module','formats.id')
        ->where('modules.name', 'like', '%' . $this->search . '%')
        ->orderBy('id', 'desc')
        ->paginate(5);

        return view('livewire.admin.formats', compact('formats'))->layout('layouts.admin');
    }
}
