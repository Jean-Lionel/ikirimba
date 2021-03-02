<?php

namespace App\Http\Livewire;

use App\Models\Compte;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class UserInfo extends Component
{
	public $connected_user;
	public $compte;

	public function mount(){
		$this->connected_user = Auth::user();

		$this->compte = Compte::where('name','=', $this->connected_user->compteName)->first(); 

	}

    public function render()
    {
        return view('livewire.user-info');
    }
}
