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




    //Modifiecation du membre 

    public $identification;
    public $first_name;
    public $last_name;
    public $cni;
    public $telephone;
    public $isUpdate = false;

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


    $selected =  array_merge([$this->selectedGroupement], $this->parentGroupement);

    $persons = Person::where(function($query) use ( $searchValue){
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

}

public function updatedSelectColline($colline_id){

    $this->groupements = Groupement::where('colline_id','=', $colline_id)->get();

    $this->parentGroupement = $this->groupements->map->id->toArray();
    $this->selectedGroupement = null;



        // $this->selectedGroupement = null;
}

public function updatedSelectedGroupement($groupement){
   $this->persons = Person::where('groupement_id','=', $groupement)->paginate();
}

public function modifier($id){
        // dd($id);

    $person = Person::find($id) ?? new Person;

    $this->identification = $person->id;
    $this->first_name = $person->first_name;
    $this->last_name = $person->last_name;
    $this->cni = $person->cni;
    $this->telephone = $person->telephone;
    $this->isUpdate =  true;
}

public function updatePerson(){
    $person = Person::find($this->identification );

    $person->id =  $this->identification;
    $person->first_name =  $this->first_name;
    $person->last_name = $this->last_name;
    $person->cni =  $this->cni;
    $person->telephone =   $this->telephone;

    $person->save();

    $this->isUpdate =  false;

}

}
