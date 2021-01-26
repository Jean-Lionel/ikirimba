<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Person extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded =[];

    public function compte(){
    	return $this->belongsTo('App\Models\Compte','id','person_id');
    }

    public function groupement(){

    	return $this->belongsTo('App\Models\Groupement','groupement_id','id');
    }

    public function getFullNameAttribute()
    {
    	return $this->first_name . " ".$this->last_name;
    }

    public static function boot(){
        parent::boot();
        self::creating(function($model){
            $model->user_id = Auth::user()->id;
        });
    }

    public static function  getPersonneById($d) : Person
    {
       return Person::find($d) ?? new Person;  
    }

    public static function getPersonneByCompteName($compteName) : Person 
    {
        $compte = Compte::where('name', '=',$compteName)->first();

        return $compte->membre ?? new Person;

    }

    //La methode permet de trouver les enfants d'un parent

    public function findChildren()
    {
        return self::where('code_parrent',$this->id)->get();
    }

    //Recuperer le parant

    public function parentDirect()
    {
         return self::where('id',$this->code_parrent)->first();

    }

    //Recuperer les freres

    public function simblings()
    {
        $parentId = $this->parentDirect() ? $this->parentDirect()->id : NULL ;

         return self::where('code_parrent',$parentId)->get();
    }

    //Trouver le membre dans le lieu parante avec moins des 
    //enfants Entre les freres ou dans les enfants
    
    public function findPersonWithMinChild()
    {
        
         $frere = $this->simblings()->filter(function ($item) {
                return $item->nombre_enfant_dirrect < 5;
             });


         $x = $frere->sortBy('nombre_enfant_dirrect');

        return $x->first();

        // return  $frere->min('nombre_enfant_dirrect');
    }


}
