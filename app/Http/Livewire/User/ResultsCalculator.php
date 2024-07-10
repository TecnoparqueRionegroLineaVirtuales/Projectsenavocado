<?php

namespace App\Http\Livewire\User;
use Illuminate\Http\Request;

use Livewire\Component;

class ResultsCalculator extends Component
{
    public $data;
    
    public $results = [
        'rprof' => 0,
        'rmo' => 0,
        'rp' => 0,
        'rk' => 0,
        'rca' => 0,
        'rmg' => 0,
        'rs' => 0,
        'rfe' => 0,
        'rmn' => 0,
        'rcu' => 0,
        'rzn' => 0,
        'rb' => 0,
        'ph' => 0,
        'rna' => 0,
        'rph' => 0,
        'rce' => 0,
        'rtm' => 0,
    ];

    //Formulario - Requerimiento nutricional

    public $requirement = [
        'tmo' => '',
        'tp' => '',
        'tk' => '',
        'tca' => '',
        'tmg' => '',
        'ts' => '',
        'tfe' => '',
        'tmn' => '',
        'tcu' => '',
        'tzn' => '', 
        'tce' => '',
        'tb' => '',
        'tph' => '',
        'tna' => '',
    ];

    //Resultado Requerimiento nutricional

    public $resultRequirement = [
        'rtmo' => 0,
        'rtp' => 0,
        'rtk' => 0,
        'rtca' => 0,
        'rtmg' => 0,
        'rts' => 0,
        'rtfe' => 0,
        'rtmn' => 0,
        'rtcu' => 0,
        'rtzn' => 0, 
        'rtce' => 0,
        'rtb' => 0,
        'rtph' => 0,
        'rtna' => 0,
    ];

    public function mount(){
        $this->data = session('dataCalculator');

        switch ($this->data['tm']) {
            case 'calido':
                $rtm = 0.3;
                break;
            
            case 'templado':
                $rtm = 0.2;
                break;
            
            case 'frio':
                $rtm = 0.15;
                break;
        }
         
        $this->results['rprof'] = $this->data['prof'];
        $this->results['rmo'] = $this->data['mo']*$rtm*$this->data['da']*$this->data['prof']*50;
        $this->results['rp'] = $this->data['p']*$this->data['prof']*$this->data['da']*22.9;
        $this->results['rk'] = $this->data['k']*$this->data['da']*$this->data['prof']*4697.9;
        $this->results['rca'] = $this->data['ca']*$this->data['da']*$this->data['prof']*2798.4;
        $this->results['rmg'] = $this->data['mg']*$this->data['da']*$this->data['prof']*1989.7;
        $this->results['rs'] = $this->data['s']*$this->data['da']*$this->data['prof']*10;
        $this->results['rfe'] = $this->data['fe']*$this->data['da']*$this->data['prof']*10;
        $this->results['rmn'] = $this->data['mn']*$this->data['da']*$this->data['prof']*10;
        $this->results['rcu'] = $this->data['cu']*$this->data['da']*$this->data['prof']*10;
        $this->results['rzn'] = $this->data['zn']*$this->data['da']*$this->data['prof']*10;
        $this->results['rb'] = $this->data['b']*$this->data['da']*$this->data['prof']*10;
        $this->results['ph'] = $this->data['ph'];
        $this->results['rna'] = $this->data['na']*$this->data['da']*$this->data['prof']*310.5;
        $this->results['rph'] = $this->data['ph'];
    
        if ($this->data['ce'] <= "1"){
            $this->results['rce'] = "Se encuentra en el rango";
        }else {
            $this->results['rce'] = "Fuera de rango";
        }
    }		
		
    public function updatedRequirementTmo()
    {
        if (!empty($this->requirement['tmo'])) {
            $this->resultRequirement['rtmo'] = $this->requirement['tmo']-$this->results['rmo'];
        }
    }

    public function updatedRequirementTp()
    {
        if (!empty($this->requirement['tp'])) {
            $this->resultRequirement['rtp'] = $this->requirement['tp']-$this->results['rp'];
        }
    }
    public function updatedRequirementTk()
    {
        if (!empty($this->requirement['tk'])) {
            $this->resultRequirement['rtk'] = $this->requirement['tk']-$this->results['rk'];
        }
    }
    public function updatedRequirementTca()
    {
        if (!empty($this->requirement['tca'])) {
            $this->resultRequirement['rtca'] = $this->requirement['tca']-$this->results['rca'];
        }
    }
    public function updatedRequirementTmg()
    {
        if (!empty($this->requirement['tmg'])) {
            $this->resultRequirement['rtmg'] = $this->requirement['tmg']-$this->results['rmg'];
        }
    }
    public function updatedRequirementTs()
    {
        if (!empty($this->requirement['ts'])) {
            $this->resultRequirement['rts'] = $this->requirement['ts']-$this->results['rs'];
        }
    }
    public function updatedRequirementTfe()
    {
        if (!empty($this->requirement['tfe'])) {
            $this->resultRequirement['rtfe'] = $this->requirement['tfe']-$this->results['rfe'];
        }
    }
    public function updatedRequirementTmn()
    {
        if (!empty($this->requirement['tmn'])) {
            $this->resultRequirement['rtmn'] = $this->requirement['tmn']-$this->results['rmn'];
        }
    }
    public function updatedRequirementTcu()
    {
        if (!empty($this->requirement['tcu'])) {
            $this->resultRequirement['rtcu'] = $this->requirement['tcu']-$this->results['rcu'];
        }
    }
    public function updatedRequirementTzn()
    {
        if (!empty($this->requirement['tzn'])) {
            $this->resultRequirement['rtzn'] = $this->requirement['tzn']-$this->results['rzn'];
        }
    }
    public function updatedRequirementTb()
    {
        if (!empty($this->requirement['tb'])) {
            $this->resultRequirement['rtb'] = $this->requirement['tb']-$this->results['rb'];
        }
    }
    public function updatedRequirementTna()
    {
        if (!empty($this->requirement['tna'])) {
            $this->resultRequirement['rtna'] = $this->requirement['tna']-$this->results['rna'];
        }
    }

    public function render()
    {
        $resultProcess = $this->results;
        $variables = $this->data;
        return view('livewire.user.results-calculator', compact('resultProcess', 'variables'))->layout('layouts.user');
    }
}
