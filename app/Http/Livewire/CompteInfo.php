<?php

namespace App\Http\Livewire;

use App\Models\Compte;
use Livewire\Component;

class CompteInfo extends Component
{
	public $compteName;
	public $compte;
	public $membre;
    public function render()
    {
    	$this->membre = $this->compte ? $this->compte->membre : null;
        return view('livewire.compte-info');
    }

    public function updatedCompteName($a){
    	
    	$this->compte = Compte::where('name','=',$this->compteName)->first();
    }
}
