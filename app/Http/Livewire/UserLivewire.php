<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithPagination;

class UserLivewire extends Component
{
	// use PasswordValidationRules;
	use WithPagination;

	protected $paginationTheme = 'bootstrap';

	public $name;
	public $email;
	public $username;
    public $role;
	public $description = "No description needded";
	public $password;
    public $identification;
    public $compteName;
	public $password_confirmation;
	public $showForm = false;

    public function render()
    {
    	$users = User::latest()->paginate(10);
        return view('livewire.user-livewire',
        	['users' => $users]

    );
    }

    protected $rules = [
    	 'name' => ['required', 'string', 'max:255'],
         'email' => ['max:255', 'unique:users'],
         'username' => ['string', 'max:255', 'unique:users'],
         'password' => ['string', 'max:255', 'unique:users'],  
         'compteName' => ['string', 'max:255', 'unique:users'],  

    ];


    public function update($propertyName){
    	$this->validateOnly($propertyName);
    }

    public function saveUser(){
    	$this->validate();
    	if($this->password === $this->password_confirmation)
    	{


         if($this->identification){
            $user = User::find($this->identification) ?? new User;

            $user->update([
                'name' => $this->name,
                'username' => $this->username,
                'email' => $this->email,
                'role' => $this->role,
                'compteName' => $this->role,
                'description' => $this->description,
                'password' => Hash::make($this->password),

            ]);

         }else{

            User::create([
            'name' => $this->name,
            'username' => $this->username,
            'email' => $this->email,
            'role' => $this->role,
            'compteName' => $this->role,
            'description' => $this->description,
            'password' => Hash::make($this->password),
          ]);

         }
    	

        	$this->email = "";

        	$this->reset();

        	session()->flash('message','Enregistrement réussi');

    	}else{
    		session()->flash('message','Les deux mot de passe sont différents');
    	}
    	
    }

    public function modifier($id)
    {
        $user = User::find($id) ?? new user; 

        $this->identification = $user->id;
        $this->name = $user->name;
        $this->username = $user->username;
        $this->email = $user->email;
        $this->description = $user->description;
        $this->showForm = true;

        //dd($user );
        
    }


    public function annuler(){
         $this->showForm = false;
         $this->reset();
    }
}
