<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use Kreait\Laravel\Firebase\Facades\Firebase;

class TestFirebase extends Component
{
    public function render()
    {
        // $db = Firebase::project('esp32-basedatos-4fd39')->database();
        $db = Firebase::database();
        $reference = $db->getReference();
        $value = $reference->getValue();
        dd($value);

        return view('livewire.user.test-firebase', compact('value'))->layout('layouts.user');
    }
}
