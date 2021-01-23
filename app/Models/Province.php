<?php

namespace App\Models;

use App\Models\Commune;
use App\Models\Person;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function communes()
    {
    	return $this->hasMany(Commune::class);
    	
    }

    public function people()
    {
    	$communes = $this->communes->map->id->toArray();
    	$collines = Colline::whereIn('commune_id', $communes )->get()->map->id->toArray();

    	$groupements = Groupement::whereIn('colline_id', $collines)->get()->map->id->toArray();

    	$people = Person::whereIn('groupement_id',$groupements)->paginate();

    	return $people;
    }

    public function  groupements()
    {
    	$communes = $this->communes->map->id->toArray();
    	$collines = Colline::whereIn('commune_id', $communes )->get()->map->id->toArray();
    	$groupements = Groupement::whereIn('colline_id', $collines)->get()->map->id->toArray();

    	return $groupements;
    	
    }
}
