<?php

namespace App\Http\Livewire\User;

use App\Models\Station;
use Livewire\Component;

class Stations extends Component
{
    public function render()
    {
        $stations = Station::join('municipalities', 'stations.municipality_id', '=', 'municipalities.id')
        ->join('veredas', 'stations.vereda_id', '=', 'veredas.id')
        ->join('departments', 'municipalities.department_id', '=', 'departments.id')
        ->select('municipalities.name as name_municipality', 'departments.name as department','veredas.name as name_vereda','stations.code','stations.name','stations.latitude', 'stations.status', 'stations.longitude', 'stations.id')
        ->orderBy('id', 'desc')
        ->get();

        return view('livewire.user.stations', compact('stations'))->layout('layouts.user');
    }
}
