<?php

namespace App\Http\Livewire;

use App\Models\Adhesion;
use App\Models\Contribution;
use App\Models\Person;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class RapportLivewire extends Component
{
	
    public $adhesion;
    public $membreTotal;
    public $contributions;
    public $jour;
    public $montantJour;


    public function mount(){
    	$this->adhesion = Adhesion::all()->sum('montant');
    	$this->membreTotal = Person::all()->count();
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
        return view('livewire.rapport-livewire');
    }


    private function contributionForSevenDay(){


    }
}
