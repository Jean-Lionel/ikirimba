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

    public $searchValue = null;
    private $parentGroupement = [];

    public function updatingProvinces()
    {
        $this->resetPage();
    }


	public function mount(){

		//$this->persons = 
		$this->provinces = Province::all();
		$this->communes = collect();
		$this->collines = collect();
		$this->groupements = collect();
	}

    public function render()
    {
        $searchValue = '%'.$this->searchValue.'%';

        //$persons = Person::latest()->paginate(10);
         // $persons= Person::where('groupement_id','=', $this->selectedGroupement)
         //                  ->orWhere('first_name','LIKE',$searchValue)
         //                  ->orWhere('last_name','LIKE',$searchValue)
         //                  ->orWhere('cni','LIKE',$searchValue)
         //                  ->orWhere('telephone','LIKE',$searchValue)->paginate();

        $selected =  array_merge([$this->selectedGroupement], $this->parentGroupement);

        $persons = Person::latest()
                           ->whereIn('groupement_id', $selected)
                           ->where(function($query) use ( $searchValue){
                                    
                                    if($searchValue !=null){
                                        $query->where('first_name','LIKE',$searchValue)
                                      ->orWhere('last_name','LIKE',$searchValue)
                                      ->orWhere('cni','LIKE',$searchValue)
                                      ->orWhere('telephone','LIKE',$searchValue)
                                    ;
                                    }
                                

                           })
                           ->paginate();

        return view('livewire.person-list',
        	[
        		'persons' => $persons

        	]

    	);
    }


    public function updatedSelectedProvince($province){

        $this->communes = Commune::where('province_id','=', $province)->get();

        $collines = Colline::whereIn('commune_id', $this->communes->map->id->toArray())->get();

        $groupements = Groupement::whereIn('Colline_id', $collines->map->id->toArray())->get();

        // $this->persons = Person::whereIn('groupement_id',$groupements->map->id->toArray())->paginate();

        $this->parentGroupement = $groupements->map->id->toArray();

        $this->selectedGroupement = null;

        // $this->selectCommune = null;
    }
    

    public function updatedSelectCommune($colline){

        $this->collines = Colline::where('commune_id','=', $colline)->get();

        $groupements = Groupement::whereIn('Colline_id', $this->collines->map->id->toArray())->get();

        // $this->persons = Person::whereIn('groupement_id',$groupements->map->id->toArray())->paginate();

        $this->parentGroupement = $groupements->map->id->toArray();
        $this->selectedGroupement = null;




        // $this->selectColline = null;
    }

    public function updatedSelectColline($colline_id){

        $this->groupements = Groupement::where('colline_id','=', $colline_id)->get();

       // $this->persons = Person::whereIn('groupement_id',$this->groupements->map->id->toArray())->paginate();

        $this->parentGroupement = $this->groupements->map->id->toArray();
        $this->selectedGroupement = null;



        // $this->selectedGroupement = null;
    }

    public function updatedSelectedGroupement($groupement){
    	$this->persons = Person::where('groupement_id','=', $groupement)->paginate();
    }

}
