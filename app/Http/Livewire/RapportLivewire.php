<?php

namespace App\Http\Livewire;

use App\Models\Compte;
use App\Models\Person;
use App\Models\Colline;
use App\Models\Commune;
use Livewire\Component;
use App\Models\Adhesion;
use App\Models\Province;
use App\Models\Groupement;
use App\Models\Contribution;
use Livewire\WithPagination;
use App\Models\StatiqueCompte;
use Illuminate\Support\Facades\DB;

class RapportLivewire extends Component
{
    public $adhesion;
    public $membreTotal;
    public $contributions;
    public $jour;
    public $montantJour;
    public $montantTotalDesMembres;
    public $bonjour = 12;
  
    public function mount(){

    	$this->adhesion = Adhesion::all()->sum('montant');
    	$this->membreTotal = Person::all()->count();
        $this->provinces = Province::all();
        $this->montantTotalDesMembres = Compte::all()->sum('montant');


        $this->contributions = Contribution::all()->sum('montant');
        $readings = DB::table('adhesions')
        ->whereDate('created_at', '>=', now()->subDays(7))
        ->selectRaw('date(created_at) date_jour, sum(montant) as montantTotal')
        ->groupBy('date_jour')
        ->get();

        $this->jour= implode(',', $readings->map->date_jour->toArray());
        $this->montantJour = implode(',', $readings->map->montantTotal->toArray());


    }


   public function render()
   {

    $membres= Person::latest()->paginate();

        $aejt = StatiqueCompte::find(1)->montant;
        $lcpc = StatiqueCompte::find(2)->montant;
        $actionnaire = StatiqueCompte::find(3)->montant;
        $membreNonApprouver = Person::where('approuve','=',"NON")->get()->count();


    return view('livewire.rapport-livewire',
        [
            'membres' => $membres,
            'aejt' => $aejt,
            'lcpc' => $lcpc,
            'actionnaire' => $actionnaire,
            'membreNonApprouver' => $membreNonApprouver

        ]

    );
}

    public function updatedCompteName(){
        $this->compte = Compte::where('name', '=', $this->compteName)->first();
    }


    private function contributionForSevenDay(){


    }

}
