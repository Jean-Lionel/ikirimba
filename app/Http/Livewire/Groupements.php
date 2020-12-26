<?php

namespace App\Http\Livewire;

use App\Models\Colline;
use App\Models\Commune;
use App\Models\Groupement;
use App\Models\Province;
use Livewire\Component;

class Groupements extends Component
{
	
    public $provinces;
    public $communes;
    public $collines;

    public $selectedProvince = null;
    public $selectCommune = null;
    public $selectColline = null;
    public $groupement = null;


    
    public function render()
    {
        return view('livewire.groupements');
    }

    private function resetInputFields(){

        // $this->selectedProvince = null;
        // $this->selectCommune = null;
        $this->colline = null;

    }

    public function mount()
    {
        $this->provinces = Province::all();
        $this->communes = collect();
        $this->collines = collect();
        
    }

    public function updatedSelectedProvince($province){

        $this->communes = Commune::where('province_id','=', $province)->get();

        $this->selectCommune = null;
    }
    

    public function updatedSelectCommune($colline){

        $this->collines = Colline::where('commune_id','=', $colline)->get();

        $this->selectColline = null;
    }


    public function store(){

        $validatedDate = $this->validate([

            'groupement' => 'required',

        ]);

        Groupement::create([
            'name' => $this->groupement,
            'colline_id' => $this->selectColline

        ]);

        $this->groupement = "";
     

    }
}
