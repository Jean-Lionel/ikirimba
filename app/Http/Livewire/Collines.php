<?php

namespace App\Http\Livewire;

use App\Models\Colline;
use App\Models\Commune;
use App\Models\Province;
use Livewire\Component;

class Collines extends Component
{
	
	public $provinces;
	public $communes;

	public $selectedProvince = null;
	public $selectCommune = null;
	public $colline = null;


	
	public function render()
	{
		return view('livewire.collines');
	}

	private function resetInputFields(){

		// $this->selectedProvince = null;
		// $this->selectCommune = null;
		$this->colline = null;

	}

	public function mount()
	{
		$this->provinces = Province::all();
		$this->communes = collect();
		
	}

	public function updatedSelectedProvince($province){

		$this->communes = Commune::where('province_id','=', $province)->get();

		$this->selectCommune = null;
	}


	public function store(){

		$validatedDate = $this->validate([

			'colline' => 'required',

		]);

		Colline::create([
			'name' => $this->colline,
			'commune_id' => $this->selectCommune

		]);
		$this->resetInputFields();
	}

}
