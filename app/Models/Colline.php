<?php

namespace App\Models;

use App\Models\Commune;
use App\Models\Groupement;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Colline extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'commune_id'];

    public function commune()
    {
    	return $this->belongsTo(Commune::class);
    }

    public function groupements()
    {
    	return $this->hasMany(Groupement::class);
    }


   //  public function  groupementsIds()
   // {
        
   //      $collines = Colline::where('commune_id', $this->id )->get()->map->id->toArray();
   //      $groupements = Groupement::whereIn('colline_id', $collines)->get()->map->id->toArray();

   //      return $groupements;
        
   //  }
}
