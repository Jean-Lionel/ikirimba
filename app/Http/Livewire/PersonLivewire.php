<?php

namespace App\Http\Livewire;

use App\Models\Adhesion;
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
    public $montant = "";
    public $parent_code = "";


    
    public function render()
    {
        return view('livewire.person-livewire');
    }



    public function mount()
    {
        //dd(Person::where('unique_code','=', '')->first());
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


 protected $rules = [

        'first_name' => 'required',
        'last_name' => 'required',
        'telephone' => 'required',
        'cni' => 'required',
        'montant' => 'required|numeric|min:15000|max:15000',
        'parent_code' => 'required|exists:comptes,name',

 ];

protected $messages = [
        'montant.min' => "Le montant d'adhésion est de 15000 FBU",
        'montant.max' => "Le montant d'adhésion est invalide",
        'parent_code.exists' => "Le compte est invalide"
    ];

 public function updatedMontant(){
    $this->validateOnly($this->montant);
 }


 public function store(){

    $this->validate();

    try {

        DB::beginTransaction();

        $personne = Person::create([
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'sexe' => $this->sexe,
            'telephone' => $this->telephone,
            'cni' => $this->cni,
            'montant' => $this->montant,
            'code_parrent' => 20//$this->getUniqueCode(),
            'groupement_id' => $this->selectedGroupement

        ]);

        $compte = Compte::create([
            'name' => 'CODE-'.$personne->id,
            'montant' => 0,
            'person_id' =>  $personne->id

        ]);

        Adhesion::create([

        ]);

        $this->membre = $personne;

        DB::commit();
        
    } catch (\Exception $e) {

       DB::rollback();

   }

   $this->resetInputFields();


}

   


    private function sharedContribution(){

        //Regarder Le parent 1D
        //Regarder Le parent 5D
        //Regarder Le parent 5D
        //
    }

    private function checkNumberEnfant(){
        
        $compte = Compte::where('name','=',$this->parent_code)->firstOrFail();

    }



    private function getUniqueCode()
    {
        //Person::where('unique_code','=', '')->first()
         $genKey = unique_code_membre();
        while (Person::where('unique_code','=', $genKey)->first()) {
            $genKey = unique_code_membre();
            
        }
        return  $genKey;
    }

}
