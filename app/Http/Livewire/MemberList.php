<?php

namespace App\Http\Livewire;

use App\Models\Colline;
use App\Models\Commune;
use App\Models\Person;
use App\Models\Province;
use Livewire\Component;

class MemberList extends Component
{

	public $provinces;
	public $selectedProvince;
	public $selectColline;
	public $selectCommune;
	public $selectGroupement;
	public $groupements;
	public $communes;
	public $collines;

	public function mount(){
		$this->provinces = Province::all();
		$this->communes = collect();
		$this->collines = collect();
		$this->groupements = collect();
	}

    public function render()
    {
    	$personnes = Province::find($this->selectedProvince)? Province::find($this->selectedProvince)->people() : collect();

    	if($this->selectCommune)
    	{
    		$personnes = Commune::find($this->selectCommune)->people();
    	}

    	if($this->selectColline){
    		$groupements = Colline::find($this->selectColline)->groupements->map->id->toArray();
    		$personnes = Person::whereIn('groupement_id', $groupements)->paginate();
    	}

        return view('livewire.member-list',[
        	'personnes' => $personnes


        ]);
    }

    public function updatedSelectedProvince($id)
    {
    	$this->communes = Province::find($id) ? Province::find($id)->communes : collect();

    	// $this->communes = Commune::where('province_id','=', $id)->get();

    	$this->selectCommune = null;
    }

    public function updatedSelectCommune($id){

    	$this->collines = Colline::where('commune_id', $id)->get();
    	$this->selectColline =  null;

    }
    public function updatedSelectColline($id)
    {
    	$this->groupements = Groupement::where('colline_id', $id)->get();
    }
}
