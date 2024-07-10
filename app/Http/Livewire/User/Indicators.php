<?php

namespace App\Http\Livewire\User;

use App\Models\Indicator;
use Livewire\Component;

class Indicators extends Component
{
    public function render()
    {
        $indicators = Indicator::select('indicators.name', 'indicators.id')
        ->orderBy('id', 'desc')
        ->get();

        return view('livewire.user.indicators', compact('indicators'))->layout('layouts.user');
    }
}
