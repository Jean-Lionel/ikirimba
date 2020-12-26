<?php

namespace App\Http\Livewire;

use App\Models\Person;
use App\Models\Province;
use Livewire\Component;

class PersonList extends Component
{
	public $persons = "";
	public $provinces;

	public function mount(){

		$this->persons = Person::latest()->get();
		$this->provinces = Province::all();
	}
    public function render()
    {
        return view('livewire.person-list');
    }
}
