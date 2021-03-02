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
    public $identification = null;
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

    //protected $rules = [];

    protected function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'username' => 'required|min:6|max:255|alpha_dash|unique:users,username,' . $this->identification,
            'email' => 'required|string|max:255|unique:users,email,' . $this->identification ,
            'compteName' => 'string|required|max:255|exists:comptes,name|unique:users,compteName,'.$this->identification,
            'role' => 'required'
        ];
    }


    // protected function validateUpdateUser(){

    //     $this->rules['name'] = "required|string| max:255";

    //     $this->rules['email'] = "max:255|unique:users,email,".$this->identification;
    //     $this->rules['username'] ="string|max:255|unique:users,username,".$this->identification;
    //     $this->rules['password'] = "string|max:255"; 
    //     $this->rules['compteName'] = "string|required|max:255|unique:users,".$this->identification; 
    //     $this->rules['role'] = 'required';
    // }


    // public function update($propertyName){
    // 	$this->validateOnly($propertyName);
    // }

    public function saveUser(){

         $validatedData = $this->validate();

    
        if($this->password === $this->password_confirmation)
        {


           if($this->identification){
            $user = User::find($this->identification) ?? new User;


            $user->name = $this->name;
            $user->username = $this->username;
            $user->email = $this->email;
            $user->role = $this->role;
            $user->compteName = $this->compteName;
            $user->description = $this->description;
            if($this->password){
                $user->password = Hash::make($this->password);
            }
            

            $user->save();

        }else{

            if($this->password == ""){
                $password = Hash::make('12345678');

            }else{
                $password = Hash::make($this->password);

            }

            User::create([
                'name' => $this->name,
                'username' => $this->username,
                'email' => $this->email,
                'role' => $this->role,
                'compteName' => $this->compteName,
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
    $this->role = $user->role;
    $this->compteName = $user->compteName;
    $this->description = $user->description;
    $this->showForm = true;

        //dd($user );

}


public function annuler(){
   $this->showForm = false;
   $this->reset();
}
}
