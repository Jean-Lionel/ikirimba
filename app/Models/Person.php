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
}
