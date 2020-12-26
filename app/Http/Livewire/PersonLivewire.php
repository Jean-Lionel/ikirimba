<?php

namespace App\Http\Livewire;

use App\Models\Colline;
use App\Models\Commune;
use App\Models\Compte;
use App\Models\Groupement;
use App\Models\Person;
use App\Models\Province;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class PersonLivewire extends Component
{
    public $provinces;
    public $communes;
    public $collines;
    public $groupements;

    public $selectedProvince = null;
    public $selectCommune = null;
    public $selectColline = null;
    public $selectedGroupement = null;
    public $membre = null;

    //Property

    public $first_name = "";
    public $last_name = "";
    public $telephone = "";
    public $cni = "";
    public $sexe = "";


    
    public function render()
    {
        return view('livewire.person-livewire');
    }



    public function mount()
    {
        $this->provinces = Province::all();
        $this->communes = collect();
        $this->collines = collect();
        $this->groupements = collect();
        
    }

    public function updatedSelectedProvince($province){

        $this->communes = Commune::where('province_id','=', $province)->get();

        $this->selectCommune = null;
    }
    

    public function updatedSelectCommune($colline){

        $this->collines = Colline::where('commune_id','=', $colline)->get();

        $this->selectColline = null;
    }

    public function updatedSelectColline($colline){


        $this->groupements = Groupement::where('colline_id','=', $colline)->get();
        $this->selectedGroupement =null;


    }

    private function resetInputFields(){

     $this->first_name = null;
     $this->last_name = null;
     $this->telephone = null;
     $this->cni =null;

 }


 public function store(){

    $validatedDate = $this->validate([

        'first_name' => 'required',
        'last_name' => 'required',
        'telephone' => 'required',
        'cni' => 'required',
          //  'groupement_id' => 

    ]);

    try {

        DB::beginTransaction();

        $personne = Person::create([
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'sexe' => $this->sexe,
            'telephone' => $this->telephone,
            'cni' => $this->cni,
            'groupement_id' => $this->selectedGroupement

        ]);

        $compte = Compte::create([
            'name' => 'CODE-'.$personne->id,
            'montant' => 0,
            'person_id' =>  $personne->id

        ]);

        $this->membre = $personne;

        DB::commit();
        
    } catch (\Exception $e) {

       DB::rollback();

   }

   $this->resetInputFields();


}
}
