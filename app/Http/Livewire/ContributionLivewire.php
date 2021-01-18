<?php

namespace App\Http\Livewire;

use App\Models\Compte;
use App\Models\Contribution;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class ContributionLivewire extends Component
{
	use WithPagination;

	protected $paginationTheme = 'bootstrap';

	public  $compteName;
	public  $montant;
	public  $type_contribution;
	public  $numberPerPage=20;

	public $compte;
	public $person_name;

	public $searchValue;



	protected $rules = [
		'montant' => 'required|numeric|min:500|max:1000000',
		//'compteName' => 'required|exists:comptes,name'
		'compteName' => 'required',
		'type_contribution' => 'required'
	];

	public function updatedNumberPerPage()
	{
		$this->render();
	}


	public function render()
	{
		$searchValue = '%'.$this->searchValue.'%';
		$contributions = Contribution::where('compte_name','like',$searchValue)
										->orWhere('type_contribution','like',$searchValue)
										->orWhere('code_transaction','=',$this->searchValue)
										->orWhere('created_at','like',$searchValue)
										->latest()->paginate($this->numberPerPage);
		return view('livewire.contribution-livewire',

			[
				'contributions' => 	$contributions
			]

	    );
	}

	public function updatedCompteName(){
		$this->compte = Compte::where('name', '=', $this->compteName)->first();
	}

	public function saveContribution()
	{
		$this->validate();

		try {

			DB::beginTransaction();
			$contribution = Contribution::create([
				'compte_name' => $this->compte->name,
				'montant' => $this->montant,
				'code_transaction' => $this->getUniqueCode(),
				'person_id' => $this->compte->membre->id,
				'compte_id' => $this->compte->id,
				'type_contribution' => $this->type_contribution,
				'person_name' => $this->person_name

			]);

			// $compte = $this->compte;

			// $compte->montant += $this->montant;

			// $compte->save();

			DB::commit();

			$this->resetInput();

			session()->flash('message',"Opération réussi CODE : ". $contribution->code_transaction);

		} catch (\Exception $e) {
			DB::rollback();

			session()->flash('error',"Une erreur s'est produite");

		}


	}

	private function resetInput()
	{
		$this->type_contribution = "";
		$this->montant = "";
		$this->compte = "";
		$this->compteName = "";
		$this->person_name = "";
	}

	public function numberPerPage(){

	}


	public function getUniqueCode()
	{
		$code = unique_code_transaction();

		while (Contribution::where('code_transaction','=',$code)->first() !== null) {
		    $code = unique_code_transaction();
		}
		return $code;
	}

}
