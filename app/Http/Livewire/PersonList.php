<?php

namespace App\Http\Livewire;

use App\Models\Colline;
use App\Models\Commune;
use App\Models\Groupement;
use App\Models\Person;
use App\Models\Province;
use Livewire\Component;
use Livewire\WithPagination;

class PersonList extends Component
{
	
	use WithPagination;
	protected $paginationTheme = 'bootstrap';

	private $persons;
	public $provinces;
	public $communes;
	public $collines;
	public $groupements;
	//Data for searching 
	public $selectedProvince = null;
    public $selectCommune = null;
    public $selectColline = null;
    public $selectedGroupement = null;
    public $groupement = null;

    public function updatingProvinces()
    {
        $this->resetPage();
    }


	public function mount(){

		$this->persons = Person::latest()->paginate();
		$this->provinces = Province::all();
		$this->communes = collect();
		$this->collines = collect();
		$this->groupements = collect();
	}

    public function render()
    {
        return view('livewire.person-list',
        	[
        		'persons' => $this->persons

        	]

    	);
    }


    public function updatedSelectedProvince($province){

        $this->communes = Commune::where('province_id','=', $province)->get();

        $collines = Colline::whereIn('commune_id', $this->communes->map->id->toArray())->get();

        $groupements = Groupement::whereIn('Colline_id', $collines->map->id->toArray())->get();

        $this->persons = Person::whereIn('groupement_id',$groupements->map->id->toArray())->paginate();

        $this->selectCommune = null;
    }
    

    public function updatedSelectCommune($colline){

        $this->collines = Colline::where('commune_id','=', $colline)->get();

        $groupements = Groupement::whereIn('Colline_id', $this->collines->map->id->toArray())->get();

        $this->persons = Person::whereIn('groupement_id',$groupements->map->id->toArray())->paginate();


        $this->selectColline = null;
    }

    public function updatedSelectColline($colline_id){

        $this->groupements = Groupement::where('colline_id','=', $colline_id)->get();

       $this->persons = Person::whereIn('groupement_id',$this->groupements->map->id->toArray())->paginate();



        $this->selectedGroupement = null;
    }

    public function updatedSelectedGroupement($groupement){
    	$this->persons = Person::where('groupement_id','=', $groupement)->paginate();
    }

}
