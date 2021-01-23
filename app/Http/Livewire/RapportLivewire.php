<?php

namespace App\Http\Livewire;

use App\Models\Adhesion;
use App\Models\Colline;
use App\Models\Commune;
use App\Models\Compte;
use App\Models\Contribution;
use App\Models\Groupement;
use App\Models\Person;
use App\Models\Province;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class RapportLivewire extends Component
{
    public $adhesion;
    public $membreTotal;
    public $contributions;
    public $jour;
    public $montantJour;
    public $montantTotalDesMembres;

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


    return view('livewire.rapport-livewire',
        [
            'membres' => $membres

        ]

    );
}


    private function contributionForSevenDay(){


    }

}
