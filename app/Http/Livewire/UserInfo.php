<?php

namespace App\Http\Livewire;

use App\Models\Compte;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserInfo extends Component
{
	public $connected_user;
	public $compte;
	public $message;
	public $showForm = false;

	public $passWord = "";
	public $confirmPassWord = "";

	public function mount(){
		$this->connected_user = Auth::user();

		$this->compte = Compte::where('name','=', $this->connected_user->compteName)->first(); 

	}

	protected $rules = [

		 'passWord' => 'required|min:6',
    	 'confirmPassWord' => 'required|min:6',

	];

	public function changePassWord()
	{
		$this->validate();
		if($this->passWord == $this->confirmPassWord){
			$user =   Auth::user();

			$user->password = Hash::make($this->passWord);
			$user->save();
		//	$this->message = "Vous avez bien modifié votre mot de passe";


			$this->message = ' <div class="alert alert-primary" role="alert">
  									Vous avez bien modifié votre mot de passe
							</div>';
		}else{

			$this->message =  ' <div class="alert alert-primary" role="alert">
  									Les deux Mots de passe sont différents
							</div>';
		}
	}

    public function render()
    {
        return view('livewire.user-info');
    }

    public function showFormChangePassWord(){
    	$this->showForm = true;

    }

    public function annulerModification(){
    	$this->passWord = "";
    	$this->confirmPassWord = "";
    	$this->showForm = false;

    }
}
