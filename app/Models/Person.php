<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
}
