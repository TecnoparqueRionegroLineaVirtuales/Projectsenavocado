<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use Kreait\Laravel\Firebase\Facades\Firebase;

class TestFirebase extends Component
{
    public function render()
    {
        $db = Firebase::database();
        $reference = $db->getReference();
        $values = $reference->getValue();
        $labels = [];
        $var0 = [];
        $var1 = [];
        $var2 = [];
        $var3 = [];
        foreach($values as $key => $value) {
            $labels[] = $key;
            $var0[] = isset($value['var0']) ? $value['var0'] : null;
            $var1[] = isset($value['var1']) ? $value['var1'] : null;
            $var2[] = isset($value['var2']) ? $value['var2'] : null;
            $var3[] = isset($value['var3']) ? $value['var3'] : null;
        };
        $data = [
            "dates" => $labels,
            "var0" => $var0,
            "var1" => $var1,
            "var2" => $var2,
            "var3" => $var3
        ];
        // dd($data['dates']);
        // return view('livewire.user.test-firebase', compact('labels, var0, var1, var2, var3'))->layout('layouts.user');
        return view('livewire.user.test-firebase', compact('data'))->layout('layouts.user');
    }
}
