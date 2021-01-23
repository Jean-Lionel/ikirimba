<?php

namespace App\Models;

use App\Models\Colline;
use App\Models\Province;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commune extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function province()
    {
    	return $this->belongsTo(Province::class);
    }

    public function collines()
    {
    	return $this->hasMany(Colline::class);
    }

   public function  groupements()
   {
    	
    	$collines = Colline::where('commune_id', $this->id )->get()->map->id->toArray();
    	$groupements = Groupement::whereIn('colline_id', $collines)->get()->map->id->toArray();

    	return $groupements;
    	
    }

    public function  people()
    {
    	$personnes = Person::whereIn('groupement_id', $this->groupements())->paginate();

    	return $personnes;
    }
}
