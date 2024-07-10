<?php

namespace App\Http\Livewire\Admin;

use App\Models\Station;
use Livewire\Component;
use Livewire\WithPagination;

class Stations extends Component
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
        $stations = Station::join('municipalities', 'stations.municipality_id', '=', 'municipalities.id')
        ->join('veredas', 'stations.vereda_id', '=', 'veredas.id')
        ->join('departments', 'municipalities.department_id', '=', 'departments.id')
        ->select('stations.code', 'stations.name','stations.latitude', 'stations.longitude', 'departments.name as department', 'municipalities.name as name_municipality', 'veredas.name as name_vereda', 'stations.status', 'stations.id')
        ->where('stations.name', 'like', '%' . $this->search . '%')
        ->orwhere('stations.code', 'like', '%' . $this->search . '%')
        ->orderBy('id', 'desc')
        ->paginate(5);

        return view('livewire.admin.stations', compact('stations'))->layout('layouts.admin');
    }
}
