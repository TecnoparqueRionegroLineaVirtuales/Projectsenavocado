<?php

namespace App\Http\Livewire\User;

use Livewire\Component;

class Calculator extends Component
{
    public $data = [
        'da' => '',
        'prof' => '',
        'tm' => '',
        'mo' => '',
        'p' => '',
        'k' => '',
        'ca' => '',
        'mg' => '',
        's' => '',
        'fe' => '',
        'mn' => '',
        'cu' => '',
        'zn' => '',
        'b' => '',
        'ce' => '',
        'ph' => '',
        'na' => '',
    ];

    

    protected $rules = [
        'data.da' => 'required',
        'data.prof' => 'required',
        'data.tm' => 'required',
        'data.mo' => 'required',
        'data.p' => 'required',
        'data.k' => 'required',
        'data.ca' => 'required',
        'data.mg' => 'required',
        'data.s' => 'required',
        'data.fe' => 'required',
        'data.mn' => 'required',
        'data.cu' => 'required',
        'data.zn' => 'required',
        'data.b' => 'required',
        'data.ce' => 'required',
        'data.ph' => 'required',
        'data.na' => 'required',
    ];

    // La siguiente función, es para mostrar un nombre legible al usuario, del dato que generó el error
    // de validación, y no el nombre del campo.
    protected $validationAttributes = [
        'data.da' => 'Densidad aparente',
        'data.prof' => 'Profundidad',
        'data.tm' => 'Clima',
        'data.mo' => 'Materia orgánica',
        'data.p' => 'Fósforo',
        'data.k' => 'Potasio',
        'data.ca' => 'Calcio',
        'data.mg' => 'Magnesio',
        'data.s' => 'Azufre',
        'data.fe' => 'Hierro',
        'data.mn' => 'Manganeso',
        'data.cu' => 'Cobre',
        'data.zn' => 'Zinc',
        'data.b' => 'Boro',
        'data.ce' => 'Conductividad eléctrica',
        'data.ph' => 'Ph',
        'data.na' => 'Sodio',
    ];

    public function process(){
        $this->validate($this->rules);

        /*$dataJson = json_encode($this->data);
        dd($dataJson);
        return $this->redirectRoute('frontend.user.resultsCalculator', ['data' => $dataJson]);*/

        session(['dataCalculator' => $this->data]);

        return $this->redirectRoute('frontend.user.resultsCalculator');
    }


    public function render()
    {
        return view('livewire.user.calculator')->layout('layouts.user');
    }
}
