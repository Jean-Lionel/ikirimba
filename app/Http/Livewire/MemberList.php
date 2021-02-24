<?php

namespace App\Http\Livewire;

use App\Models\Colline;
use App\Models\Commune;
use App\Models\Groupement;
use App\Models\Person;
use App\Models\Province;
use Livewire\Component;
use Livewire\WithPagination;

class MemberList extends Component
{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';

	public $provinces;
	public $selectedProvince;
	public $selectColline;
	public $selectCommune;
	public $selectGroupement;
	public $groupements;
	public $communes;
	public $collines;
    public $searchKey;

	public function mount(){
		$this->provinces = Province::all();
		$this->communes = collect();
		$this->collines = collect();
		$this->groupements = collect();
	}

    public function render()
    {

    	$groupements = Province::find($this->selectedProvince)? Province::find($this->selectedProvince)->groupements() : collect();

    	if($this->selectCommune)
    	{
    		$groupements = Commune::find($this->selectCommune)->groupements();
    	}

    	if($this->selectColline){
    		$groupements = Colline::find($this->selectColline)->groupements->map->id->toArray();
    	}

        if($this->selectGroupement){
            $groupements = [$this->selectGroupement];
        }

        $searchKey = '%'. $this->searchKey .'%';


        $personnes = Person::whereIn('groupement_id', $groupements)
                            ->where(function($query) use ($searchKey){
                                $query->where('first_name', 'like', $searchKey)
                                      ->orWhere('last_name', 'like' , $searchKey)
                                      ->orWhere('telephone', 'like' , $searchKey);
                            })->paginate();

         $personnes_list = Person::whereIn('groupement_id', $groupements)
                            ->where(function($query) use ($searchKey){
                                $query->where('first_name', 'like', $searchKey)
                                      ->orWhere('last_name', 'like' , $searchKey)
                                      ->orWhere('telephone', 'like' , $searchKey);
                            })->get();

        return view('livewire.member-list',[
        	'personnes' => $personnes,
            'personnes_list' => $personnes_list
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
