<?php

namespace App\Http\Livewire;

use App\Models\Adhesion;
use App\Models\Colline;
use App\Models\Commune;
use App\Models\Compte;
use App\Models\Groupement;
use App\Models\Person;
use App\Models\Province;
use App\Models\SharedIncome;
use Carbon\Carbon;
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


    public $showForm = true;
    //Property

    public $first_name = "";
    public $last_name = "";
    public $telephone = "";
    public $cni = "";
    public $sexe = "";
    public $montant = "";
    public $parent_code = "";
    public $code_parrent_indirect = "";


    public $confirming;

    public function confirmDelete($id)
    {
        $this->confirming = $id;
    }
    
    public function render()
    {
         // $this->$membreNonApprouver = collect();
        return view('livewire.person-livewire',
            [
                // 'membreNonApprouver' => Person::where('approuve','<>',"NON")->get()
                'membreNonApprouver' => Person::all()
            ]);
    }



    public function mount()
    {
        // dd(Person::find(1));
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
     $this->parent_code =null;
     $this->parrain_inderrect =null;

 }

 protected $rules = [

    'first_name' => 'required',
    'last_name' => 'required',
    'telephone' => 'required',
    'montant' => 'required|numeric|min:15000|max:15000',
];

private function validateParentCode(){
    if(Compte::all()->count() > 5){
        $this->rules['parent_code'] = 'required|exists:comptes,name';
    }
}

protected $messages = [
    'montant.min' => "Le montant d'adhésion est de 15000 FBU",
    'montant.max' => "Le montant d'adhésion est invalide",
    'parent_code.exists' => "Le compte est invalide",
    'parent_code.required' => "Le compte est obligatoire",
];

public function updatedMontant(){
    $this->validateOnly($this->montant);
}


public function store(){

    $this->validateParentCode();
    $this->validate();

    //Si le membre ne depasser pas 5 enfant

    if($this->checkNumberEnfant()){
        try {

            DB::beginTransaction();

            $compte = Compte::where('name','=',$this->parent_code)->first();

            $personne = Person::create([
                'first_name' => $this->first_name,
                'last_name' => $this->last_name,
                'sexe' => $this->sexe,
                'telephone' => $this->telephone,
                'montant' => $this->montant,
                'approuve' => "NON",
            'code_parrent' => $compte->person_id ?? null,//$this->getUniqueCode(),
            'code_parrent_indirect' => $this->code_parrent_indirect,
            'groupement_id' => $this->selectedGroupement

        ]);

            $compte = Compte::create([
                'name' => $this->getUniqueAcountName(),
                'montant' => 0,
                'person_id' =>  $personne->id

            ]);

            $this->membre = $personne;
            DB::commit();
            $this->resetInputFields();
            
            session()->flash('message',"Enregistrement réussi");

        } catch (\Exception $e) {

        //dd($e->getMessage());
            DB::rollback();
            session()->flash('error',$e->getMessage());
        }
    }

}
    //Verifier que le membre a le doit d'ajouter le nouveau adherant

private function checkNumberEnfant(){

    $compte = Compte::where('name','=',$this->parent_code)->first();

    if($compte == null and Compte::all()->count()){
        session()->flash('error',"Le numéro de compte n'existe pas" );

        return false;
    }
    if($compte !== null && $compte->membre->nombre_enfant_dirrect == 5){
        //Si le nombre d'enfant est egale a 5
        // On cherche dans ces frere le plus jeunes 
        //SI tout ces freres on les 5
        // On chercher danse ces enfants direct
        //si non on remonte dans le systeme

        $person = $compte->membre;

       // $this->code_parrent_indirect = 

        


        session()->flash('error',"Vous avez déjà attient le nombre maximum " );
        return false;
    }

    return true;
}

private function sharedContribution($enfant){

    $montant = $enfant->montant;
    $montant_caisse = $enfant->montant;

    //Pour le premier recoit 1/5

    $parent = Person::find($enfant->code_parrent);

    if($parent !== null){
            //dd( $parent );
            $m = $montant/ 5; // 15000 /5 = 3000
            $parent->compte->montant += $m;
            $parent->compte->save();
            //On diminuer la somme

            $parent->nombre_enfant_dirrect +=1;
            $parent->save();

           // dd($parent->compte);
            $montant_caisse -=  $m ;
            $this->saveSharedMontant($enfant, $parent, $m);

            $limite = 1;

            while ($parent = Person::find($parent->code_parrent) and $limite <= 5) {
                $montant_gagne = $montant / 10; //15000 / 10 = 1500
                $parent->compte->montant += $montant_gagne;
                $montant_caisse -=  $montant_gagne ;
                $parent->compte->save();
                $this->saveSharedMontant($enfant, $parent, $m);
                $limite++; //incrementation
                $this->saveSharedMontant($enfant, $parent, $montant_gagne);   
            }

 // $montant_caisse

        }

        Adhesion::create([
            'person_id' => $enfant->id,
            'compte_name' => $enfant->compte->name,
            'montant' => $montant_caisse,
                // 'montant' => $enfant->montant_caisse,
        ]);


        //Les autres 5 rocoit 1 /10

        //Regarder Le parent 1D
        //Regarder Le parent 5D
        //Regarder Le parent 5D
        //
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

private function getUniqueAcountName()
{
   $genName = code_name();

   $i = 0;

   while (Compte::where('name','=', $genName)->first()) {
    $genName = code_name();
    $i++;

             //Si on arrive a 10 tours sans trouver le resultat on ajouter une
             //On ajoute le prefixe
    if($i >=1000)
    {
        $genName = rand(0, 999).'-'.$genName;
    }

}

return $genName;

}

public function saveSharedMontant($enfant,$parent , $montant){
 SharedIncome::create([
    'compte_dep' => $enfant->compte->name,
    'compte_rec' => $parent->compte->name,
    'montant' => $montant
]);

 return true;
}


public function approuverEnregistrement($membre){

    try {
        DB::beginTransaction();

        $personne = Person::find($membre);
        $personne->approuve = Carbon::now();

        $personne->save();
        $this->sharedContribution($personne);

        if($personne->code_parrent_indirect){
            // Search For TWo Parent 
            // Uwamuzanye hamwe nuwo yamuzaniye
            $parrain_inderrect = Person::getPersonneByCompteName($personne->code_parrent_indirect);
            $parrain_dirrect = Person::getPersonneById($personne->code_parrent);

            //Enlevement de 1500 pour le parrant qui n'a pas travailler
            $parrain_dirrect->compte->montant -= 1500;
            $parrain_inderrect->compte->montant += 1500;

            $this->saveSharedMontant($parrain_dirrect->compte->name, $parrain_inderrect->compte->name, 1500 );

            $parrain_dirrect->compte->save();
            $parrain_inderrect->compte->save();

        }

        DB::commit();

    } catch (\Exception $e) {
        DB::rollback();
        dump($e->getMessage());
    }

    return back();
}


public function refuserEnregistrement($id)
{

  try {
   $mbre = Person::find($id);
   $mbre->compte->delete();
   $mbre->delete();
} catch (\Exception $e) {

    dump($e->getMessage());

}
return back();  
}

}
